<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div id="mit-test" class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <h1>Horizontal Flip</h1>
                    <form class="form-inline" @submit.prevent="check('hr')">
                        <div class="form-group mb-2">
                            <label for="hr_result" class="sr-only">Result Horizontal Flip</label>
                            <input type="text" readonly class="form-control-plaintext" id="hr_result" v-model="hr_result">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="hr" class="sr-only">Horizontal Flip</label>
                            <input type="text" class="form-control" id="hr" placeholder="Horizontal Flip" v-model="hr">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2" @click="check('hr')">Confirm</button>
                    </form>
                </div>
                <div class="col-12">
                <h1>Vertical Flip</h1>
                    <form class="form-inline" @submit.prevent="check('v')">
                        <div class="form-group mb-2">
                            <label for="v_result" class="sr-only">Result Vertical Flip</label>
                            <input type="text" readonly class="form-control-plaintext" id="v_result" v-model="v_result">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="v" class="sr-only">Vertical Flip</label>
                            <input type="text" class="form-control" id="v" placeholder="Vertical Flip" v-model="v">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2" @click="check('v')">Confirm</button>
                    </form>
                </div>
                <div class="col-12">
                    <h1>Shift By</h1>
                    <form class="form-inline" @submit.prevent="check('shift')">
                        <div class="form-group mb-2">
                            <label for="shift_result" class="sr-only">Result Shift By</label>
                            <input type="text" readonly class="form-control-plaintext" id="shift_result" v-model="shift_result">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="shift" class="sr-only">Shift By</label>
                            <input type="text" class="form-control" id="sift" placeholder="Shift By" v-model="shift">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2" @click="check('shift')">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
      new Vue({
        el: '#mit-test',
        data: {
          hr: '',
          hr_result: '',
          v: '',
          v_result: '',
          shift: 0,
          shift_result: 0
        },
        methods: {
            check(target) {
                let _this = this
                axios.get(`/api/${target}/${this[target]}`).then(function(r){
                    try {
                        console.log(r.data.result)
                        _this[`${target}_result`] = r.data.result
                    } catch(err) {
                        console.log(err)
                    }
                }).catch(function(err) {
                    cosole.log(err)
                })
            }
        }
      })
    })
    </script>
    </body>
</html>
