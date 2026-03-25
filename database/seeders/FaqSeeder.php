<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MongoDB\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faqs = [
            [
                "name" => "FAQ 1",
                "locale" => [
                    "es" => ["question" => "¿Cómo puedo crear una cuenta?", "answer" => "Haz clic en 'Registrarse' y sigue los pasos."],
                    "ca" => ["question" => "Com puc crear un compte?", "answer" => "Fes clic a 'Registra't' i segueix els passos."],
                    "en" => ["question" => "How can I create an account?", "answer" => "Click 'Sign Up' and follow the steps."]
                ]
            ],
            [
                "name" => "FAQ 2",
                "locale" => [
                    "es" => ["question" => "¿Olvidé mi contraseña, qué hago?", "answer" => "Usa 'Recuperar contraseña' para restablecerla."],
                    "ca" => ["question" => "He oblidat la meva contrasenya, què faig?", "answer" => "Utilitza 'Recupera contrasenya' per restablir-la."],
                    "en" => ["question" => "I forgot my password, what do I do?", "answer" => "Use 'Forgot Password' to reset it."]
                ]
            ],
            [
                "name" => "FAQ 3",
                "locale" => [
                    "es" => ["question" => "¿Cómo puedo contactar con soporte?", "answer" => "Envía un correo a soporte@ejemplo.com."],
                    "ca" => ["question" => "Com puc contactar amb suport?", "answer" => "Envia un correu a suport@exemple.com."],
                    "en" => ["question" => "How can I contact support?", "answer" => "Send an email to support@example.com."]
                ]
            ],
            [
                "name" => "FAQ 4",
                "locale" => [
                    "es" => ["question" => "¿Puedo cambiar mi correo electrónico?", "answer" => "Ve a 'Configuración' y actualiza tu correo."],
                    "ca" => ["question" => "Puc canviar el meu correu electrònic?", "answer" => "Ves a 'Configuració' i actualitza el teu correu."],
                    "en" => ["question" => "Can I change my email?", "answer" => "Go to 'Settings' and update your email."]
                ]
            ],
            [
                "name" => "FAQ 5",
                "locale" => [
                    "es" => ["question" => "¿Cómo elimino mi cuenta?", "answer" => "Contacta con soporte para solicitar la eliminación de tu cuenta."],
                    "ca" => ["question" => "Com elimino el meu compte?", "answer" => "Contacta amb suport per sol·licitar l'eliminació del teu compte."],
                    "en" => ["question" => "How do I delete my account?", "answer" => "Contact support to request account deletion."]
                ]
            ],
            [
                "name" => "FAQ 6",
                "locale" => [
                    "es" => ["question" => "¿Hay versión móvil?", "answer" => "Nuestra plataforma funciona en móviles y tabletas."],
                    "ca" => ["question" => "Hi ha versió mòbil?", "answer" => "La nostra plataforma funciona en mòbils i tauletes."],
                    "en" => ["question" => "Is there a mobile version?", "answer" => "Our platform works on mobile and tablet devices."]
                ]
            ],
            [
                "name" => "FAQ 7",
                "locale" => [
                    "es" => ["question" => "¿Puedo cambiar de idioma?", "answer" => "Selecciona tu idioma en el menú superior."],
                    "ca" => ["question" => "Puc canviar d'idioma?", "answer" => "Selecciona el teu idioma al menú superior."],
                    "en" => ["question" => "Can I change the language?", "answer" => "Select your language in the top menu."]
                ]
            ],
            [
                "name" => "FAQ 8",
                "locale" => [
                    "es" => ["question" => "¿Qué métodos de pago se aceptan?", "answer" => "Aceptamos tarjeta, PayPal y transferencias bancarias."],
                    "ca" => ["question" => "Quins mètodes de pagament s'accepten?", "answer" => "Acceptem targeta, PayPal i transferències bancàries."],
                    "en" => ["question" => "What payment methods are accepted?", "answer" => "We accept card, PayPal, and bank transfers."]
                ]
            ],
            [
                "name" => "FAQ 9",
                "locale" => [
                    "es" => ["question" => "¿Cómo actualizo mis datos personales?", "answer" => "Ve a 'Perfil' y edita tu información."],
                    "ca" => ["question" => "Com actualitzo les meves dades personals?", "answer" => "Ves a 'Perfil' i edita la teva informació."],
                    "en" => ["question" => "How do I update my personal information?", "answer" => "Go to 'Profile' and edit your information."]
                ]
            ],
            [
                "name" => "FAQ 10",
                "locale" => [
                    "es" => ["question" => "¿Puedo cancelar mi suscripción?", "answer" => "Ve a 'Suscripciones' y selecciona cancelar."],
                    "ca" => ["question" => "Puc cancel·lar la meva subscripció?", "answer" => "Ves a 'Subscripcions' i selecciona cancel·lar."],
                    "en" => ["question" => "Can I cancel my subscription?", "answer" => "Go to 'Subscriptions' and select cancel."]
                ]
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
