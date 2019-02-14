<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style type="text/css">
    .success {
        color: green
    }
    .fail {
        color: red;
    }
    </style>
</head>
<body>

<button id="check">Check Site</button>

<div id="content"></div>

<script type="text/javascript" src="./jquery.js"></script>
<script type="text/javascript">
(function($) {
    $('#check').on('click', function(event) {
        
        var content = $('#content');

        content.empty();


        var response = $.getJSON('data.json', function(response) {
            $.each(response.data, function(i, value) {
                $.ajax({
                    url: value + 'ads.txt',
                    async: true,
                    crossDomain: true,
                    dataType: 'jsonp',
                    statusCode: {
                        200: function() {
                            content.append('<p class="success">Success: ' + value + ' &#10004;</p>');
                        },
                        404: function() {
                            content.append('<p class="fail">Failed: ' + value + ' &#10007;</p>');
                        }
                    }
                });
            });
        });

    });
})(jQuery)
</script>
</body>
</html>