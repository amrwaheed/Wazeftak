$(document).ready(function() {
/*    function createDate() {
        var date = new Date(),
            yr = date.getFullYear(),
            month = date.getMonth() + 1,
            day = date.getDate(),
            todayDate = month + '-' + day   + '-' + yr;
        console.log(todayDate);
        return todayDate;
    }*/
    function createDate() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    return today;
    }
    $('#date').val(createDate());

});
