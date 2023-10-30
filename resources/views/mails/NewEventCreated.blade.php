@extends('mails.layout.app')

@section('email')

    <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #F1F3F3;" width="100%">
        <tbody>
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                    <tbody>
                    <tr>
                        <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="650">
                                <tbody>
                                <tr>
                                    <th class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px;" width="100%">
                                        <div class="spacer_block" style="height:35px;line-height:35px;"> </div>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                    <tbody>
                    <tr>
                        <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="650">
                                <tbody>
                                <tr>
                                    <th class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; background-color: #FFFFFF; border-left: 8px solid #F1F3F3; border-right: 8px solid #F1F3F3; padding-left: 50px; padding-right: 50px; padding-top: 50px;" width="100%">

                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block mobile_hide" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                            <tr>
                                                <td>
                                                    <div style="font-family: Arial, sans-serif">
                                                        <div style="font-size: 12px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #66BECD; line-height: 1.2;">
                                                            <p style="margin: 0; font-size: 14px;line-height: 0.7"><span style="font-size:28px;">
                                                                    <strong>HELLO! {{$user->name}}</strong></span></p>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <table border="0" cellpadding="10" cellspacing="0" class="text_block desktop_hide" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-hide: all; display: none; max-height: 0; overflow: hidden; word-break: break-word;" width="100%">
                                            <tr>
                                                <td>
                                                    <div style="font-family: Arial, sans-serif">
                                                        <div style="font-size: 12px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #66BECD; line-height: 1.2;">
                                                            <p style="margin: 0; font-size: 14px;line-height: 0.7"><span style="font-size:28px;">
                                                               <strong>HELLO! {{$user->name}}</strong></span></p>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="spacer_block" style="height:5px;line-height:5px;"> </div>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                    <tbody>
                    <tr>
                        <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="650">
                                <tbody>
                                <tr>
                                    <th class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; background-color: #FFFFFF; border-left: 8px solid #F1F3F3; border-right: 8px solid #F1F3F3; padding-top: 25px; padding-bottom: 0px;" width="100%">
                                        <table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tr>
                                                <td style="padding-top:10px;width:100%;padding-right:0px;padding-left:0px;">
                                                    <hr style="width:50%;border-color:#dadadf24;background-color:#dadadf24;">
                                                </td>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                    <tbody>
                    <tr>
                        <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="650">
                                <tbody>
                                <tr>
                                    <th class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; background-color: #FFFFFF; border-left: 8px solid #F1F3F3; border-right: 8px solid #F1F3F3; padding-left: 50px; padding-right: 50px; padding-top: 35px; padding-bottom: 5px;" width="100%">
                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                            <tr>
                                                <td style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:15px;">
                                                    <div style="font-family: sans-serif">
                                                        <div style="font-size: 12px; color: #555555; line-height: 1.5; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
                                                            <p style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 25.5px;"><span style="font-size:17px;">
                                                     It is to Inform you that there is new Event "{{$event_content->title}}" is going to happen in your city,
                                                                    please visit the our site for further details if you are interested
                                                                </span>
                                                            </p>
                                                          </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                    <tbody>
                    <tr>
                        <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="650">
                                <tbody>
                                <tr>
                                    <th class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-left: 8px solid #F1F3F3; border-right: 8px solid #F1F3F3; padding-top: 0px; padding-bottom: 45px;" width="100%">
                                        <table border="0" cellpadding="10" cellspacing="0" class="button_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tr>
                                                <td>
                                                    <div align="center">
                                                        {{-- <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" style="height:42px;width:86px;v-text-anchor:middle;" arcsize="10%" stroke="false" fillcolor="#3AAEE0"><w:anchorlock/><v:textbox inset="0px,0px,0px,0px"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->--}}
                                                        <div style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#3AAEE0;border-radius:4px;width:auto;border-top:1px solid #3AAEE0;border-right:1px solid #3AAEE0;border-bottom:1px solid #3AAEE0;border-left:1px solid #3AAEE0;padding-top:5px;padding-bottom:5px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;">
                                                            <a href="{{route('events.show',$event_content->id)}}" target="_blank" style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;letter-spacing:normal;text-decoration: none; cursor:pointer;">
                                                                <span style="font-size: 16px; line-height: 2; mso-line-height-alt: 32px; color:white">View Event Details.</span>
                                                            </a>
                                                        </div>
{{--                                                         <!--[if mso]></center></v:textbox></v:roundrect><![endif]-->--}}
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <div style="font-size: 12px; color: #555555; line-height: 1.5; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
                                                                        <p style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 25.5px;">
                                                                            <span style="font-size:17px;">
                                                                                If above Button don't work please click here on given Link: <br>
                                                                                <a href="{{route('events.show',$event_content->id)}}" target="_blank">{{route('events.show',$event_content->id)}}</a>
                                                                            </span>
                                                                        </p>
                                                                    </div>

                                                                </td>
                                                            </tr>
                                                        </table>


                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                    <tbody>
                    <tr>
                        <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="650">
                                <tbody>
                                <tr>
                                    <th class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; background-color: #FFFFFF; border-left: 8px solid #F1F3F3; border-right: 8px solid #F1F3F3; padding-left: 50px; padding-right: 50px; padding-top: 30px; padding-bottom: 30px;" width="100%">
                                        <table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                            <tr>
                                                <td>
                                                    <div style="font-family: sans-serif">
                                                        <div style="font-size: 12px; color: #555555; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
                                                            <p style="margin: 0; font-size: 14px; text-align: left;">This event is Organized by " <strong style="color: #66BECD;">{{$event_content->getOrganizer()->name}}</strong></p>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>





@endsection
