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

<div id="app" v-bind:title="title">

    <p>{{ message + " " + surname + " " + from}}</p>
    <p>{{ message }} {{ surname }} {{ from }} html</p>

    <h3 v-if="!status == 1">Count = 1</h3>
    <h3 v-else-if="status == 2">Count = 2</h3>
    <h3 v-else>Count = {{status}}</h3>

    <template v-if="template">
        <h4>Block number 1</h4>
        <p>Content number 1</p>
    </template>
    <template v-else>
        <h4>Block number 2</h4>
        <p>Content number 2</p>
    </template>

    <h3 v-show="show">With v-show</h3>

    <div class="default" :class="{ active: isActive, noActive: isNoActive}"></div>
    <div :class="[ isActive ? 'now active' : 'now disabled', 'always default']"></div>

    <h1 :style="{ color: 'red', 'font-size': size + 'px'}">Text</h1>

</div>

<script type="text/javascript">
    var app = new Vue({
        el: '#app',
        data: {
            message: 'Hello',
            surname: 'Zhizhnevskiy',
            from: 'from Vue!',
            title: 'Title from Vue',
            status: 0,
            template: true,
            show: 0,
            isActive: true,
            isNoActive: 1,
            size: 15
        }
    })
</script>

</body>
</html>
