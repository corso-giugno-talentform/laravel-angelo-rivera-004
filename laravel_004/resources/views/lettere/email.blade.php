<div
    style="max-width: 600px; margin: auto; background-color: #141414; padding: 30px; border-radius: 10px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #fff; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
    <!-- Logo Netflix (puoi inserire un'immagine se vuoi) -->
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="https://img.icons8.com/?size=100&id=PrR9uwml5KOs&format=png&color=000000" alt="{{ env('APP_NAME') }}"
            style="width: 120px;">
    </div>


    <h2 style="color: #e50914; font-size: 24px; margin-bottom: 10px;">Registrazione avvenuta con successo!</h2>


    <p style="font-size: 16px; line-height: 1.5;">
        Ciao {{ $input['name'] }},<br><br>
        Grazie per esserti registrato su <strong>{{ env('APP_NAME') }}</strong>. La tua esperienza inizia ora!
    </p>

    <div style="text-align: center; margin: 30px 0;">
        <a href=""
            style="background-color: #e50914; color: #fff; padding: 14px 24px; border-radius: 4px; text-decoration: none; font-weight: bold; font-size: 16px;">Accedi
            ora</a>
    </div>

    <p style="font-size: 14px; color: #999; text-align: center;">
        Se hai bisogno di aiuto, visita il nostro Centro assistenza.
    </p>

    <div style="margin-top: 20px; text-align: center;">
        <x-footer />
    </div>
</div>
