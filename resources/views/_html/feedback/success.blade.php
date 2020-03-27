<style>
    body > .container {
        min-height: calc(100vh - 92px - 41px);
    }

    .feedback_thanks, 
    .feedback_goback {
        font-size: 1.75rem;
    }

    .feedback_thanks {
        margin: 30px 0;
    }
</style>

<h2>Сообщение отправлено</h2>
<p class="feedback_thanks">Спасибо, ждите ответа</p>
<a class="feedback_goback" href={{ route('index') }}>На главную</a>