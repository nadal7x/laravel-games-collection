<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $client = OpenAI::client(env('OPENAI_API_KEY'));

        /*//// Chat con prompts ////*/
        $response = $client->responses()->create([
            'prompt' => [
                'id' => 'pmpt_69e89cb2aee88195b733a29feae7f66a044b0f745717813b',
                'variables' => [
                    'query' => $request->message
                ]
            ]
        ]);

      $firstReply = '';

foreach ($response->output as $output) {
    if (!isset($output->content)) continue;

    foreach ($output->content as $content) {
        if ($content->type === 'output_text') {
            $firstReply .= $content->text;
        }
    }
}
$secondResponse = $client->responses()->create([
    'prompt' => [
        'id' => 'pmpt_69e9eb296f008194b9a8a0e9c0448aec0b6ffea02e06d325',
        'variables' => [
            'query' => $firstReply
        ]
    ]
]);

$reply = '';

foreach ($secondResponse->output as $output) {
    if (!isset($output->content)) continue;

    foreach ($output->content as $content) {
        if ($content->type === 'output_text') {
            $reply .= $content->text;
        }
    }
}

    // /*//// Chat con assistant ////*/

    // // 1. Crear thread
    // $thread = $client->threads()->create([]);

    // // 2. Mensaje usuario
    // $client->threads()->messages()->create($thread->id, [
    //     'role' => 'user',
    //     'content' => $request->message,
    // ]);

    // // 3. Ejecutar assistant
    // $run = $client->threads()->runs()->create($thread->id, [
    //     'assistant_id' => 'asst_McrCZNskOzdcJF7EP4f70PhZ',
    // ]);

    // // 4. Esperar respuesta
    // do {
    //     $run = $client->threads()->runs()->retrieve($thread->id, $run->id);
    //     sleep(1);
    // } while ($run->status !== 'completed');

    // // 5. Obtener mensajes
    // $messages = $client->threads()->messages()->list($thread->id);

    // $reply = $messages->data[0]->content[0]->text->value ?? '';



return response()->json([
    'reply' => $reply
]);
    }
}