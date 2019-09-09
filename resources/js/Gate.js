export default class Gate{

    constructor(user){
        this.user = user;
    }


    admin(){
        return this.user.type === 'admin';
    }

    consultant(){
        return this.user.type === 'consultant';
    }
    



}
