<?php

require_once 'vendor/autoload.php';

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\SymfonyCache;
use BotMan\BotMan\Drivers\DriverManager;

require('OnboardingConversation.php');

$config = [];

DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

$adapter = new FilesystemAdapter();

$botman = BotManFactory::create($config, new SymfonyCache($adapter));

$botman->hears('Hello', function($bot) {
    $bot->startConversation(new OnboardingConversation); 
});

$botman->hears('Hey', function($bot) {
    $bot->startConversation(new OnboardingConversation); 
});

$botman->hears('Hi', function($bot) {
    $bot->startConversation(new OnboardingConversation); 
});

$botman->hears('Change my name', function($bot) {
    $bot->reply('What should I call you?'); 
});

$botman->hears('call me {name}', function($bot, $name) {
    $bot->reply('Okay, I will now call you ' . $name); 
});

$botman->hears('I want to download a {type} from {webite}', function($bot,  $type, $website) {
    $bot->reply('Enter ' . $type. ' URL'. ' to download from '.$website); 
});

$botman->hears('Help', function($bot) {
    $bot->reply('<b>'.'Here are a list of Questions You can ask'.'</b>'. '<br>' .
                '<ul>'.
                    '<li>' . '1. Who is the founder of HNG' . '</li>'. 
                    '<li>' . '2. What is the purpose of HNG' . '</li>'.
                    '<li>' . '3. How many teams remain in HNGi7' . '</li>'.
                    '<li>' . '4. Who is the best Intern in HNGi7' . '</li>'.
                '</ul>'            
    ); 
});

$botman->hears('Who is the founder of HNG', function($bot) {
    $bot->reply('The Founder of HNG is '.'<b>' .'Mr. Mark Essien'.'</b>'); 
});

$botman->hears('1', function($bot) {
    $bot->reply('The Founder of HNG is '.'<b>' .'Mr. Mark Essien'.'</b>'); 
});

$botman->hears('What is the purpose of HNG', function($bot) {
    $bot->reply('<b>' .'To develop and refine Interns in the World of ICT'.'</b>'); 
});

$botman->hears('2', function($bot) {
    $bot->reply('<b>' .'To develop and refine Interns in the World of ICT'.'</b>'); 
});

$botman->hears('How many teams remain in HNGi7', function($bot) {
    $bot->reply('<b>' .'There are 6 Teams left. These are:'.'</b>' . '</br>'.
                '<ul>'.
                    '<li>' . '1. Team Sentry' . '</li>'. 
                    '<li>' . '2. Team Incredible' . '</li>'.
                    '<li>' . '3. Team Falcon' . '</li>'.
                    '<li>' . '4. Team Fierce' . '</li>'.
                    '<li>' . '5. Team Fury' . '</li>'.
                '</ul>'     
            ); 
});

$botman->hears('3', function($bot) {
    $bot->reply('<b>' .'There are 6 Teams left. These are:'.'</b>' . '</br>'.
                '<ul>'.
                    '<li>' . '1. Team Sentry' . '</li>'. 
                    '<li>' . '2. Team Incredible' . '</li>'.
                    '<li>' . '3. Team Falcon' . '</li>'.
                    '<li>' . '4. Team Fierce' . '</li>'.
                    '<li>' . '5. Team Fury' . '</li>'.
                '</ul>'     
            ); 
});

$botman->hears('Who is the best Intern in HNGi7', function($bot) {
    $bot->reply('The best Intern at the moment should certainly be @KC'); 
});

$botman->hears('4', function($bot) {
    $bot->reply('The best Intern at the moment should certainly be @KC'); 
});

$botman->hears('Thank you', function($bot) {
    $bot->reply('You are welcome'); 
});

$botman->fallback(function($bot) {
    $bot->reply('I cant process this command for now!! Say "help" for a list of available commands'); 
});

$botman->listen();