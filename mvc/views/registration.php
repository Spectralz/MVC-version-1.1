<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center text-center">
            <div class="row">
                <div class="col-9">
                    <div class="d-flex justify-content-center text-center">
                        <h3>
                            Форма регистрации
                        </h3>
                    </div>
                    <?php
                    if(isset($_SESSION['congratulations'])){
                        echo $_SESSION['congratulations'];
                    }elseif(isset($_SESSION['warning']['message'])) {
                        echo $_SESSION['warning']['message'];
                    }else{

                    } ?>
                    <form  class="text-decoration-none" id="formRegistration">
                        <ul class="list-unstyled">
                            <li>
                                <input type="text" name="name"  value="" placeholder="name" required="">
                            </li>
                            <li>
                                <input type="text" name="telephone" value="" placeholder="telephone" required="">
                            </li>
                            <li>
                                <input type="text" name="email" value="" placeholder="email" required="">
                            </li>
                            <li>
                                <input type="password" name="password" value="" placeholder="password" required="">
                            </li>
                            <li>
                                <input type="submit" value="Зарегистрироваться">
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="result"></div>

<script>

    let form = document.getElementById('formRegistration');
    form.addEventListener('submit', function(
        event) {

        let promise = fetch('/registrationForm/', {
            method: 'POST',
            body: new FormData(this),
        });

        promise.then(
            response => {
                return response.text();
            }
        ).then(
            text => {
                if(text == 'true'){
                    result.innerHTML = text;
                } else {
                    window.location.href = '/';
                }

            }
        );
        event.preventDefault();
    });

</script>
