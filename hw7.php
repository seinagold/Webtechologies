<!-- 
purplecolor: #3b0359;
darkpurplecolor: #3b0359;
bluecolor:#122680; 
yellowcolor: #ffe054;
pinkcolor: #ffc6b8;
-->

<html>
    <head>
        <meta charset='utf-8'>
        <title> Server&Client  </title>
        <style> 
            :root 
            {
                background-color: #3b0359;
                color: #ffe054;
                font-family: calibri;
                font-style: italic;
            }
            .quest
            {
                font-weight: bold; 
                color: #ffc6b8
            }
            legend
            {
                color:#122680;
                background-color:#ffc6b8;
                padding: 3px 6px;
            }
            
            
        </style>
    </head>
    <body>
        <main>
            <h1> Жалобная страница </h1>
            <form method='GET' action='hw7.php'>
            <section>
            <fieldset>
                <legend>
                     Представьтесь, пожалуйста 
                </legend>
                 <span class = 'quest'>  Напишите Ваше полное имя  </span> <br>
               <input type='text' name='client_name'> 
               <p class ='quest'>
                    Укажите способ, как нам с Вами связаться  </p>
                   <span>E-mail: </span>
                   <input type='mail' name='client_mail'>
             
            </fieldset>
            <br>
            <fieldset>
                <legend> Что Вас огорчило?</legend>
                <span class = 'quest'> Укажите, пожалуйста, что именно Вас расстроило в нашей работе </span> <br>
                <ul>
                    <li> <input type='radio' name='claim' value="worker's service">
                       Поведение нашего работника/работников;
                    </li>
                      <li> <input type='radio' name='claim' value=' our atmosphere'>
                        Атмосфера в заведении;
                    </li>
                    <li> <input type='radio' name='claim' value='a quality of service'>
                        Качество предоставляемых услуг.
                    </li>
                </ul>
                <span  class = 'quest'> Напишите подробно о произошедшем, чтобы мы могли принять меры</span>
                <br>
                <textarea name='response' cols='70' rows='5'> </textarea>
            </fieldset>
               <br>
               <button type='submit' style = 'background-color:#ffc6b8; position: relative; left:350px'> Засуньте свою жалобу сюда </button>
            </form>
            <section>
                <fieldset>
                    <legend> Ваша жалоба </legend>
                    <div> Dear <?php echo $_GET['client_name']; ?>! We've already accepted your claim and taking measures regarding <?php echo $_GET['claim']; ?> </div>
                </fieldset>
            </section>
            <br>
            <!-- Тут начинается вторая часть задания-->
            <form id= 'rating'>
                <span class='quest'> Оцените, пожалуйста, работу нашего сайта и сервиса по работе с жалобами клиентов! </span>
                <span> Какова вероятность, что вы порекомендуете наш сервис своим знакомым? <br> <i>Оцените от 0 до 5, где 0 - самая негативная оценка, 5 - самая положительная</i></span> <br>
                <select name='rate' style= 'background-color:#ffc6b8;'>
                    <option value ='five'> 5  </option>
                    <option value ='four'> 4  </option>
                    <option value ='three'> 3  </option>
                    <option value ='two'> 2  </option>
                    <option value ='one'> 1  </option>
                    <option value ='zero'> 0  </option>
                </select>
                <button type='submit' style = 'background-color:#ffc6b8; position: relative; left:350px'> Claim </button>
            </form> <!-- Эту форму будем фетчить-->
             <section>
                <fieldset>
                    <legend> Thank you for rating! </legend>
                    <div> You've rated us by <?php echo $_POST['rate']; ?> </div>
                </fieldset>
            </section>
           <script>

            let rate = document.getElementById('rating');
            
            
            function fetchIt(event)
             {
                event.preventDefault();
                let fragmForm = new FormData(rate);
                postIt(fragmForm);
                
                function postIt(fragmForm)
                {
                    fetch('hw7.php', 
                    {
                        method: 'POST',
                        body: fragmForm
                    }).then (response =>  response.text() )
                    .then (text => { console.log(text);});
                }
            }
            rate.addEventListener('click', function(event) 
            {
                event.preventDefault();
                let fragmForm = new FormData(rate);
                postIt(fragmForm);
                
                function postIt(fragmForm)
                {
                    fetch('hw7.php', 
                    {
                        method: 'POST',
                        body: fragmForm
                    }).then (response =>  response.text() )
                    .then (text => { console.log(text);});
                }
            });
            </script>
        </main>
    </body>
</html>
