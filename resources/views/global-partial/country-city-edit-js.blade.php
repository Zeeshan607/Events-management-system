<script>

    let country_ov=$("#country").val();
    let city_ov=$("#city").data("old_value");

    $(document).ready(function(){
        $.getJSON("{{asset('APi/countries+cities.json')}}", function(data){

            data.map(function(obj, i) {


                if(obj.name=="Pakistan") {
                    //COUNTRY SELECT INPUT
                    if(obj.name==country_ov){
                        $('#country').val(obj.name);
                        $('#country').prop('readonly', "true");

                        //CITY SELECT INPUT
                        if ($("#city").children("option").length > 1) {
                            $("#city").empty();
                            $('#city').append("<option value='null'>--Select--</option>")
                        }
                        obj.cities.map(function (c) {
                            if(c.name== city_ov){
                                $('#city').append("<option value='" + c.name + "' selected>" + c.name + "</option>")
                            }else{
                                $('#city').append("<option value='" + c.name + "'>" + c.name + "</option>")

                            }
                        });

                    }else{
                        $('#country').val(obj.name);
                        $('#country').prop('readonly', "true");
                    }

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

