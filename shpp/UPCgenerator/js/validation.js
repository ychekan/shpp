/**
 * Created by ret284 on 07.10.2016.
 */
// function validTypeForm() {
//     var prefix = document.forms['ups']['prefix'].value;
//     // var x=document.forms['form']['name'].value;
//     // var y=document.forms['form']['email'].value;
//     //Если поле name пустое выведем сообщение и предотвратим отправку формы
//     if (x.length==0){
//         document.getElementById('namef').innerHTML='*данное поле обязательно для заполнения';
//         return false;
//     }
// }

alert("test");
function check(){
    var prefix = document.forms["ups"]["prefix"].value;
    var main = document.forms["ups"]["main"].value;
    var start = document.forms["ups"]["start"].value;
    var count = document.forms["ups"]["count"].value;
    if (prefix > 0){
        alert(prefix);
    }


}