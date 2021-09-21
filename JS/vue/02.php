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

    <ul>
        <li v-for="(value, index) in list">
            index: {{index}}, value: {{ value }}
        </li>
    </ul>

    <ul>
        <li v-for="user in users">
            id: {{user.id}}, name: {{ user.name }}
        </li>
    </ul>

    <table border="1">
        <thead @click="nameFunctionOne">
        <th>ID</th>
        <th>Name</th>
        </thead>
        <tbody>
        <tr v-for="user in users" @click="users[0].id = 24">
            <td>{{user.id}}</td>
            <td>{{user.name}}</td>
        </tr>
        </tbody>
    </table>

</div>

<script type="text/javascript">
    var app = new Vue({
        el: '#vue',
        data: {
            list: ['one', 'two', 'three'],
            users: [
                {id: 1, name: 'Yuriy'},
                {id: 2, name: 'Nadya'},
                {id: 3, name: 'Ilya'},
                {id: 4, name: 'Egor'},
                {id: 5, name: 'Zahar'}
            ]
        },
        methods: {
            nameFunctionOne(){
                alert('nameFunctionOne');
            },
            nameFunctionSecond: function(){
                alert('nameFunctionSecond');
            }
        }
    })
</script>

</body>
</html>
