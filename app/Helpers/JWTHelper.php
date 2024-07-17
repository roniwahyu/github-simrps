<?php

namespace App\Helpers;
use Exception;
use Firebase\JWT\JWT;
class JWTHelper
{
	// encoding data
	public static function encode($data) {
		try{
			$secret = config('auth.jwt_secret');
			$algorithm = config('auth.jwt_algorithm');
			$duration = config('auth.jwt_duration');
			$iat = time(); // time of token issued at
            $nbf = $iat + 10; //not before in seconds
            $exp = strtotime("+$duration minutes"); // expire time of token in seconds
			$iss = config('app.url');
			$payload = array(
				"iss" => $iss,
				"aud" => $iss,
				"iat" => time(),
				"nbf" => $nbf,
				"exp" => $exp,
				"data" => $data,
			);
			//throw new Exception($nbf);
			return JWT::encode($payload, $secret, $algorithm);
		}
		catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}

	// decode the token
	public static function decode($jwt) {
		try{
			$secret = config('auth.jwt_secret');
			$algorithm = config('auth.jwt_algorithm');
			$decoded = JWT::decode($jwt, $secret, [$algorithm]);
			return $decoded->data;
		}
		catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
}