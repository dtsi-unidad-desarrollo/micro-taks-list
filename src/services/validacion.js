export default class validaciones {
    static checkEmail(email) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email,))
  {
    return true;
  }
    return false;
}

    static minCaracteres(name, minCaracteres) {
        if (name.lenght < minCaracteres ){
            return false;
        }
        return true;

    }
};
