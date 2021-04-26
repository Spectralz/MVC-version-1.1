<?php


namespace classes;

use classes\Logger;

class CSV
{
    public $file;
    public $fileOpen;
    public $table;
    public function __construct($table){
        $this->table = $table;
        $this->file = 'CSVFiles/'.$table.'.csv';
    }
    public function getColumnNames(){
        $columsName = [];

      if (($this->fileOpen = fopen($this->file, 'r')) !== FALSE) {
            $data = fgetcsv($this->fileOpen, 255, ";");
            $num = count($data);
            for ($c=0; $c < $num; $c++) {
                $columsName[] = $data[$c];
            }
        }
        fclose($this->fileOpen);
        return $columsName;
    }
    public function fileGetContent(){
        $result = [];
        $row = -1;
        $columsName = self::getColumnNames();
        if (($this->fileOpen = fopen($this->file, 'r')) !== FALSE) {
            while (($data = fgetcsv($this->fileOpen, 255, ";")) !== FALSE) {
                $num = count($data);
                for ($c=0; $c < $num; $c++) {
                    $result[$row][$columsName[$c]] = $data[$c];
                }
                $row++;
            }
            unset($result[-1]);
            fclose($this->fileOpen);

        return $result;
    }}

    public function fileShowContent(){

        $row = 1;
        if (($this->fileOpen = fopen($this->file, 'r')) !== FALSE) {
            while (($data = fgetcsv($this->fileOpen, 255, ";")) !== FALSE) {
                $num = count($data);
                echo "<p> $num полей в строке $row: <br /></p>\n";
                $row++;
                for ($c=0; $c < $num; $c++) {
                    echo $data[$c] . "<br />\n";
                }
            }
            fclose($this->fileOpen);
        }
    }

    public function filePutContent(array $list)
    {
        $this->fileOpen = fopen($this->file, 'a');
        ini_set("auto_detect_line_endings", true);
        fputcsv($this->fileOpen, $list, ";");
        fclose($this->fileOpen);
    }

    public function rewriteContent()
    {
        $file=file_get_contents($this->file);
        $file = str_replace("hello;my;friend", "Chair 100", $file);
        file_put_contents($this->file, $file);
    }

    public function convertFromCSVToJson()
    {
        $content = $this->fileGetContent();
        $json = json_encode($content, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
        file_put_contents('CSVFiles/users.json' , $json);
    }

    public function convertFromJsonToCSV()
    {
        $content = file_get_contents('users.json');
        $json = json_decode($content, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
        return $json;
    }

    public function fileDownload($fileExtension)
    {
        $filename = 'CSVFiles/'.$this->table.'.csv';

        if (file_exists($filename)) {
            if($fileExtension == 'csv'){

            }elseif ($fileExtension == 'json'){
                $this->convertFromCSVToJson();
            }elseif ($fileExtension == 'xml'){
                $this->convertFromCSVToXml();
            }else {
                throw new Logger('Warning' , 'No such type');
            }
            $path = 'CSVFiles/'.$this->table.".".$fileExtension;
            return $path;
        } else {
            echo "Файл $filename не существует";
        }
    }

    public function convertFromCSVToXml(){

        $row = 0;
        $columsName = self::getColumnNames();
        if (($this->fileOpen = fopen($this->file, 'r')) !== FALSE) {
            $xml='<users>';
            while (($data = fgetcsv($this->fileOpen, 255, ";")) !== FALSE) {
                $num = count($data);

                $xml.= '<row>'.$row.'</row>';
                for ($c=0; $c < $num; $c++) {
                    $xml.= '<'.$columsName[$c].'>'.$data[$c].'</'.$columsName[$c].'>';
                }
                $row++;
            }
        }
        $xml.='</users>';
        $sxe = new \SimpleXMLElement($xml);
        $dom = new \DOMDocument('1,0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($sxe->asXML());
        $dom->save('CSVFiles/'.$this->table.'.xml');
        return $xml;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}
