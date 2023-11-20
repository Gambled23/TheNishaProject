@extends ('layouts.main')
@section('body')
<head>
    <title>Preguntas comúnes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        li {
            border-bottom: 1px solid #ccc; 
            padding-bottom: 10px; 
            margin-bottom: 10px; 
        }
        .noLine{
            border-bottom: none;
            padding-bottom: 0px;
            margin-bottom: 0px;
            text-align: center;
            font-size: 1.5em; 
        }
    </style>
</head>
<section class="px-14">
    <h2 class="text-2xl font-bold mb-4">Preguntas comúnes</h2>
    <ul class="space-y-4">
        <li>
            <h3 class="text-lg font-semibold">¿Qué métodos de pago admiten?</h3>
            <p class="text-gray-600">Pensando en la fácilidad de nuestros clientes, la página admite sólo pagos en PayPal.</p>
        </li>
        <li>
            <h3 class="text-lg font-semibold">¿En dónde entregan?</h3>
            <p class="text-gray-600">De momento se hacen entregas en CUCEI, CUCEA y cualquier estación de la linea 3 del tren ligero.</p>
        </li>
        <li>
            <h3 class="text-lg font-semibold">¿Cuanto tarda mi pedido en estar listo?</h3>
            <p class="text-gray-600">La realización del producto puede tardar varias semanas, dependiendo la complejidad del producto y la carga de trabajo.</p>
        </li>
        <li>
            <h3 class="text-lg font-semibold">¿Cómo saber cuando está listo mi pedido?</h3>
            <p class="text-gray-600"><b>Nisha</b> se comunicará contigo mediante el correo electronico que usaste para registrarte.<br>Además, es posible consultar el estado de tu pedido desde tu <a href="{{ route('account') }}" class="text-violet-800 hover:text-violet-950">cuenta</a>.</p>
        </li>
        <li>
            <h3 class="text-lg font-semibold">¿Es posible hacer envíos nacionales?</h3>
            <p class="text-gray-600">Para envíos por paquetería favor de mandar DM en <a href="https://www.instagram.com/nisha_crochet/" target="_blank" class="text-violet-800 hover:text-violet-950">instagram</a>.</p>
        </li>
        <li>
            <h3 class="text-lg font-semibold">¿Hacen pedidos personalizados?</h3>
            <p class="text-gray-600">Sí!, si quieres hablar sobre un producto personalizado puedes comunicarte por DM en <a href="https://www.instagram.com/nisha_crochet/" target="_blank" class="text-violet-800 hover:text-violet-950">instagram</a>. Sujeto a cupos.</p>
        </li>
        <li>
            <h3 class="text-lg font-semibold">¿Cuantos cupos tienen actualmente?</h3>
            <p class="text-gray-600">Para saber los cupos disponibles en el mes, puedes revisar nuestro perfil de <a href="https://www.instagram.com/nisha_crochet/" target="_blank" class="text-violet-800 hover:text-violet-950">instagram</a>.</p>
        </li>
        <li>
            <h3 class="text-lg font-semibold">¿Es necesario pagar por adelantado?</h3>
            <p class="text-gray-600">En caso de pedir mediante la página web, sí, pero no te preocupes! Nos aseguramos de usar PayPal para que te sientas más seguro sobre tu dinero.<br>Nunca te vamos a pedir datos sobre tu tarjeta.<br>
                                       En caso de un pedido personalizado, se aparta el cupo con 50% del precio final.</p>
        </li>
        <li>
            <h3 class="text-lg font-semibold">¿Es posible pedir un reembolso?</h3>
            <p class="text-gray-600">En dado caso de insatisfacción puedes comunicarte con nosotros en <a href="https://www.instagram.com/nisha_crochet/" target="_blank" class="text-violet-800 hover:text-violet-950">instagram</a>. Estaremos encantados de ayudarte! :></p>
        </li>
        <br>
        <li class="noLine">
            <h3 class="text-lg font-semibold">¿Tienes una pregunta que no aparece aquí? Contactanos!</h3>    
            <a href="https://www.instagram.com/nisha_crochet/" class="text-violet-800 hover:text-violet-950" target="_blank"><i class="fab fa-instagram"></i> Nisha💕</a>
        </li>
    </ul>
</section>

@endsection