<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script type="text/javascript">
function ajaxCallGET(){
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            dataType: 'json',
            url: '/tst',
            type: 'GET',
            success: function(response) { // when the request is done delete the previously placed products for new ones
                console.log(response);
                for (let i = 0; i < response.length; i++) {
                    let element = response[i];
                    ajaxCallADD(element);

                }

            }
        });}
    function ajaxCallADD(response){
            console.log(response);
            title = response.title;
            author = response.author;
            description = response.description;
            date_published = response.date_published;
            image = response.image;
            publisher = response.publisher;
            price = response.price;
            pages = response.pages;
            language = response.language;
            if (typeof variable !== 'undefined') {
            if(date_published.includes("(")){
                date_published = date_published.substring(0,date_published.indexOf("("));
            }
        }else{
            date_published = Math.floor(Math.random() * (2021 - 1980) + 1980);
        }
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            dataType: 'json',
            url: '/add',
            type: 'POST',
            data:{
                title: title,
                author: author,
                description: description,
                date_published: date_published,
                image: image,
                publisher: publisher,
                price: price,
                pages: pages,
                language: language
            },
            success: function(response) { // when the request is done delete the previously placed products for new ones
                console.log(response);

            }
        });}
    </script>
    <title>Document</title>
</head>
<body>
        <button onclick="ajaxCallGET()">PRESS ME</button>
</body>
</html>
