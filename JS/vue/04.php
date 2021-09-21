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
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Document</title>
</head>
<body>

<div id="vue">
    <h3>{{textSearch}} (length = {{textSearch.length}})</h3>
    <input type="text" size="50" v-model="textSearch">

    <button type="button" @click="getCities">Download</button>

    <ul>
        <li v-for="hashtag in hashtags">{{ hashtag }}</li>
    </ul>

    <ul>
        <li v-for="city in cities">{{ city.region }}: {{city.city}}</li>
    </ul>

</div>

<script type="text/javascript">
    var app = new Vue({
        el: '#vue',
        data: {
            hashtags: [],
            cities: [],
            textSearch: '',
            url: {
                hashtags: 'https://dka-develop.ru/api?type=hashtag',
                cities: 'https://dka-develop.ru/api?type=city'
            }
        },
        watch: {
            textSearch: function () {
                if (this.textSearch.length > 3) {
                    this.textSearch = 'Change this text';
                }
            }
        },
        created: function () {
            console.log(this.url.cities);
        },
        methods: {
            getHashtags() {
                axios.get(this.url.hashtags).then((response) => {
                    console.log(response.data);
                    console.log(this);
                    this.hashtags = response.data;
                })
            },
            getCities() {
                axios.get(this.url.cities).then((response) => {
                    console.log(response.data);
                    console.log(this);
                    this.cities = response.data;
                })
            }
        }
    })
</script>

</body>
</html>
