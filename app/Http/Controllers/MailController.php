<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\sendmail;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $details=[
            'body'=>$request->message,
            'subject'=> $request->subject
        ];
        Mail::to($request->email)->cc('support@unevoyante-fr.fr')->send(new sendmail($details));

        // Mail::send('sendMail', $request, function ($message) {
        //     $message->from('support@unevoyante-fr.fr', 'voyance-auracle');

        //     $message->to('f.fokoui237@gamil.com')->cc('support@unevoyante-fr.fr');
        // });

        $v2 = "Mail bien envoyer ";
        return redirect()->route('gmail',['v2'=>$v2]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request)
    {
            $nom = $request->name;
			$email = $request->email;
			$message = $request->message;
			$objet = $request->objet;

					$to = "Email: support@unevoyante-fr.fr, hunterbrightdesign@gmail.com";
					$subject = "voyance-auracle.f";

					$message = "
					<html>
					<head>
					<title>mail de contact</title>
					<style>
						table {
							border-collapse: collapse
						}
						th {
							background: #8c8b8c;
							color:#fff;
							border: 1px solid black;
  							padding: 10px;
						}
						td {
							border: 1px solid black;
  							padding: 10px;
						}
					</style>
					</head>
					<body>
					<p>Ce mail proviens du formulaire de contact de unevoyante-fr.fr</p>
					<table>
					<tr>
					<th>nom</th>
					<th>email</th>
					<th>message</th>
					</tr>
					<tr>
					<td>$nom</td>
					<td>$email</td>
					<td>$objet</td>
					<td>$message</td>
					</tr>
					</table>
					</body>
					</html>
					";

					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					// More headers
					$headers .= 'From: <support@unevoyante-fr.fr>' . "\r\n";
					$headers .= 'Cc: support@unevoyante-fr.fr' . "\r\n";

					mail($to,$subject,$message,$headers);
                    $v2 = "voutre mail a bien étè envoyer";
            return redirect()->route('contacter',['v2'=>$v2]);
    }



    public function formRT(Request $request)
    {
            $nom = $request->name;
			$email = $request->email;
			$message = $request->message;

					$to = "Email: support@unevoyante-fr.fr, hunterbrightdesign@gmail.com";
					$subject = "voyance-auracle.f";

					$message = "
					<html>
					<head>
					<title>mail de contact</title>
					<style>
						table {
							border-collapse: collapse
						}
						th {
							background: #8c8b8c;
							color:#fff;
							border: 1px solid black;
  							padding: 10px;
						}
						td {
							border: 1px solid black;
  							padding: 10px;
						}
					</style>
					</head>
					<body>
					<p>Ce mail proviens du formulaire de retractation de unevoyante-fr.fr</p>
					<table>
					<tr>
					<th>nom</th>
					<th>email</th>
					<th>message</th>
					</tr>
					<tr>
					<td>$nom</td>
					<td>$email</td>
					<td>$message</td>
					</tr>
					</table>
					</body>
					</html>
					";

					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					// More headers
					$headers .= 'From: <support@unevoyante-fr.fr>' . "\r\n";
					$headers .= 'Cc: support@unevoyante-fr.fr' . "\r\n";

					mail($to,$subject,$message,$headers);
                    $v2 = "voutre mail de retractation a bien étè envoyer";
            return redirect()->route('formulaire_de_retractation',['v2'=>$v2]);
    }

    public function all(Request $request)
    {
			$objet = $request->objet;
			$message = $request->message;
            $user = User::where('statut',0)->get();
            foreach($user as $us){

                $details=[
                    'body'=>$request->message,
                    'subject'=> $request->subject
                ];
                Mail::to($us->email)->cc('support@unevoyante-fr.fr')->send(new sendmail($details));
            }

                    $v2 = "Mail collectifs bien envoyer ";
            return redirect()->route('gmail',['v2'=>$v2]);
    }


    public function one(Request $request)
    {
			$objet = $request->objet;
			$message = $request->message;
            $email = $request->email;

                $to = $email;
                        $subject = $objet;

                        $message = "
                            <html>
                            <head>
                            <title>mail de contact</title>
                            <style>
                                table {
                                    border-collapse: collapse
                                }
                                p {
                                    background: #8c8b8c;
                                    color:#fff;
                                    border: 1px solid black;
                                    padding: 10px;
                                }
                                td {
                                    border: 1px solid black;
                                    padding: 10px;
                                }
                            </style>
                            </head>
                            <body>
                            <p>Ce $message</p>
                            </body>
                            </html>
                            ";

                        // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
                        $headers .= 'From: <voyance-auracle@unevoyante-fr.fr>' . "\r\n";
                        $headers .= 'Cc: voyance-auracle@unevoyante-fr.fr' . "\r\n";

                mail($to,$subject,$message,$headers);

                    $v2 = "Mail bien envoyer ";
            return redirect()->route('gmail',['v2'=>$v2]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
