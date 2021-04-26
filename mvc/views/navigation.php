<div class="btn-toolbar btn-group-vertical" aria-label="Toolbar with button groups">

    <?php
    if(\classes\Session::read()){?>
        <h5>Добро пожаловать</h5>
        <form class="row w-100 g-2" action="/logout" method="POST">
            <button type="submit" class="btn btn-secondary  m-1 btn-block">Выйти</button>
        </form>
        <?php
    }else{?>
        <button type="button" class="btn btn-secondary btn-sm mb-2" disabled>
            <?php
                if(isset($_GET['warning'])){
                    echo $_GET['warning'];
                }else{
                    echo 'Войти';
                }
            ?>
        </button>

        <form class="row g-2" action="/authentication" method="POST">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <input type="email" class="form-control" name="email" required id="staticEmail2" placeholder="email@example.com">
                </div>
                <div class="col-1"></div>

            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <input type="password" class="form-control" id="inputPassword2" required name="password" placeholder="Password">
                </div>
                <div class="col-1"></div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-2 p-0">Авторизация</button>
        </form>
        <?php
    }?>

    <?
    foreach (\controllers\Navigation::navBar() as $path => $name){ ?>
        <a href="<?php echo $path ?>" class="btn btn-primary"><?php echo $name ?></a>
    <?php }?>

</div>



