<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizontal Scroll with Columns</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: scroll;
            /* Enable horizontal scroll */
        }

        .container {
            display: flex;
        }

        .column {
            flex: 1;
            min-width: 100px;
            /* Minimum width for columns */
            padding: 10px;
        }

        .box {
            height: 40px;
            width: 100px;
            background-color: #f0f0f0;
            /* Light gray background color */
            border: 1px solid #ccc;
            /* Border to see the box */
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="column">
        </div>
    </div>
    <div>
        <button id="" onclick="shuffle_array()">Shuffle</button>
    </div>
    <div>
        <button id="" onclick="reshuffle_array()">Reshuffle</button>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script>
    shuffle_array()
    // $(document).ready(function() {
    function shuffle_array() {
        axios.get("{{ route('shuffle_array') }}")
            .then(function(response) {
                $('.column').empty();

                console.log(response.data);
                response.data.forEach(item => {
                    var col =
                        `<div class="box" style="background-color:${item};"></div>`;
                    $('.column').append(col);
                });
            })
            .catch(function(error) {
                console.log(error);
            });
    }
    function reshuffle_array() {
        axios.get("{{ route('reshuffle_array') }}")
            .then(function(response) {
                $('.column').empty();

                console.log(response.data);
                response.data.forEach(item => {
                    var col =
                        `<div class="box" style="background-color:${item};"></div>`;
                    $('.column').append(col);
                });
            })
            .catch(function(error) {
                console.log(error);
            });
    }
    // });
</script>

</html>
