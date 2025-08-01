<div
    style="max-width:700px; margin:auto; background:#141414; padding:20px; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.3); font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color:#fff;">

    <div style="background-color:#e50914; padding:10px; border-radius:4px 4px 0 0;">
        <h4 style="margin:0; text-align:center; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">Nuovo
            utente registrato</h4>
    </div>

    <div style="padding:15px; color:#ddd;">
        <p style="margin-bottom:15px; font-size:16px;">
            <strong>Si è registrato questo utente:</strong> {{ $input['name'] }}
        </p>

        <ul style="list-style:none; padding:0; margin-bottom:15px;">
            <li style="background-color:#333; margin-bottom:8px; padding:10px; border-radius:4px; font-size:15px;">
                <strong>Email:</strong> {{ $input['email'] }}
            </li>
        </ul>
    </div>
</div>
