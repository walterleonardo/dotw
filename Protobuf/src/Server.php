<?php

declare(strict_types=1);

namespace Dotw\Proto;

class Server
{
	public function run(): void
	{
		$method = ltrim(rawurldecode($_SERVER['REQUEST_URI']), '/');

		switch ($method) {
			case 'psfilter':
				$request = new PsfilterRequest();
				$request->mergeFromString(file_get_contents('php://input'));
				$reply = (new Service())->psfilter($request);
				echo $reply->serializeToString();
				break;
			default:
				http_response_code(404);
		}
	}
}