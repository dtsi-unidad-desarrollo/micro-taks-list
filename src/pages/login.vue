<template>
    <div class="row">
        <div class="cod-md-6 offset-md-3">
    <div>
        <div>
            <h3>login {{ firstName }}</h3>
            <hr />
        </div>
        <form @submit.prevent="onLogin()">
            <div class="form-group">
                <label>Email</label>
                <br>
                <input type="text" class="from-control" v-model="email"/>
                <div class="error" v-if="errors.email">{{ error.email }}</div>
            </div>
            <br>
            <div class="form-group">
                <label>Contraseña</label>
                <br>
                <input type="Password" class="from-control" v-model="password"/>
                <div class="error" v-if="errors.password">{{ error.password }}</div>
            </div>
                
                <div class="my-3">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            
               </form>
            </div>
        </div>
    </div>
 
</template>

<script>
import {validacionRegistro} from '../services/validacionRegistro.js'
export default {
    data() {
        return {
            email : '',
            password: '',
            error : [],
        };
    },
     methods: {
         onLogin () {

             let validaciones = new validacionRegistro(this.email, this.password);
             this.errors = validaciones.chequearValidaciones();
             if (this.errors.lenght){
                return false;
             }

             //registro
              },
},
};
</script>