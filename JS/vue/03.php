<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <script src="https://unpkg.com/vue"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <title>Document</title>
</head>
<body>

<div id="vue">

    <button @click="high">Counter = {{ counter }}</button>

</div>

<script type="text/javascript">
    var app = new Vue({
        el: '#vue',
        data: {
            counter: 1
        },
        created: function () {
            this.counter = this.counter + 3;
            this.high();
        },
        methods: {
            high() {
                this.counter++;
            }
        }
    })
</script>

</body>
</html>
