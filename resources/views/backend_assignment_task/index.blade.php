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

        /* Adjust the number of boxes per column */
        .column:nth-child(1) .box {
            /* 1 box in 1st column */
            display: block;
        }

        .column:nth-child(2) .box:nth-child(-n+2) {
            /* 2 boxes in 2nd column */
            display: block;
        }

        .column:nth-child(3) .box:nth-child(-n+4) {
            /* 4 boxes in 3rd column */
            display: block;
        }
    </style>
</head>

<body>
    <a href="{{ route('second_task') }}">This is the Second Task</a>
    <div class="container">

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script>
    function load_boxes() {
        axios.get("{{ route('get_count') }}")
            .then(function(response) {
                // handle success
                $('.container').empty();
                const data = response.data;
                const dataKeys = Object.keys(data);
                console.log('dataKeys: ', dataKeys);
                //outer loop on obj keys
                dataKeys.forEach(key => {
                    console.log('key: ', key);
                    let col = `<div class="column">`;
                    //inner loop on array
                    data[key].forEach(item => {
                        col += `<div class="box" style="background-color: ${item.color};"></div>`;
                    });
                    col += `</div>`;
                    $('.container').append(col);
                });
            })
            .catch(function(error) {
                // handle error
                console.log(error);
            });
    }

    load_boxes();
    setInterval(load_boxes, 10000);
</script>

</html>
