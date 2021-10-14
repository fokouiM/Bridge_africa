<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

					$to = "Email: contact@voyance-auracle.fr, hunterbrightdesign@gmail.com";
					$subject = "webplan site";

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
					<p>Ce mail proviens du formulaire de contact de voyance-auracle.fr</p>
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
					$headers .= 'From: <contact@voyance-auracle.fr>' . "\r\n";
					$headers .= 'Cc: contact@voyance-auracle.fr' . "\r\n";

					mail($to,$subject,$message,$headers);
                    $v2 = "voutre mail a bien étè envoyer";
            return redirect()->route('contacter',['v2'=>$v2]);
    }



    public function formRT(Request $request)
    {
            $nom = $request->name;
			$email = $request->email;
			$message = $request->message;

					$to = "Email: contact@voyance-auracle.fr, hunterbrightdesign@gmail.com";
					$subject = "webplan site";

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
					<p>Ce mail proviens du formulaire de retractation de voyance-auracle.fr</p>
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
					$headers .= 'From: <contact@voyance-auracle.fr>' . "\r\n";
					$headers .= 'Cc: contact@voyance-auracle.fr' . "\r\n";

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

                $to = "$us->email";
                        $subject = "$objet";

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
                        $headers .= 'From: <contact@voyance-auracle.fr>' . "\r\n";
                        $headers .= 'Cc: contact@voyance-auracle.fr' . "\r\n";

                mail($to,$subject,$message,$headers);
            }

                    $v2 = "Mail collectifs bien envoyer ";
            return redirect()->route('gmail',['v2'=>$v2]);
    }


    public function one(Request $request)
    {
			$objet = $request->objet;
			$message = $request->message;
            $email = $request->email;

                $to = "$email";
                        $subject = "$objet";

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
                        $headers .= 'From: <contact@voyance-auracle.fr>' . "\r\n";
                        $headers .= 'Cc: contact@voyance-auracle.fr' . "\r\n";

                mail($to,$subject,$message,$headers);

                    $v3 = "Mail bien envoyer ";
            return redirect()->route('gmail',['v3'=>$v3]);
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
