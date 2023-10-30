
<script>
    // var country_cities=[];

    $(document).ready(function(){
    $.getJSON("{{asset('APi/countries+cities.json')}}", function(data){
    data.map(function(obj, i) {
    if(obj.name=="Pakistan") {

        $('#country').val(obj.name);
        $('#country').prop('readonly', "true");
        if ($("#city").children("option").length > 1) {
            $("#city").empty();
            $('#city').append("<option value='null'>--Select--</option>")
        }
        obj.cities.map(function (c) {
            $('#city').append("<option value='" + c.name + "'>" + c.name + "</option>")
        });
    }

    });

    }).fail(function(){
            $("#err").append("<p class='text-danger'>OOPs! something went wrong while loading countries data,please try again</p>")
            setTimeout(function(){
             $("#err > p").remove();
            },4000)
    });

    });


</script>

