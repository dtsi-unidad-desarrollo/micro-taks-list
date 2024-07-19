import validaciones from "./validacion";

export default class validacionRegistro {
    constructor (email, password) {
        this.email = email;
        this.password = password;
    }

    chequearValidacion() {
        let errors = [];

        //email validation

        if (!validaciones.checkEmail(this.email)) {
            errors ['email'] = 'Email invalido';
        }

        

        //contraseña o password validation

        if (!validaciones.minCaracteres(this.password, 6)) {
            errors ['password'] = 'contraseña deber ser de mas 6 caracteres';
        }

        return errors;
    }
}