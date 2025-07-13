<td class="align-middle text-center">
    <div class="flex-column align-items-center justify-content-center">
    <div class="valueContCroit">
    <span class="cont_croit">
        @foreach ($croixChaines as $croixChaine)
        @if ($croixChaine->car_id == $car->id)
        {{-- @if ($croixChaine->car_id == $car->id && $croixChaine->croix_chaine !=0) --}}
            @php
                $durerCroit = 100000;
                $contCroit = $croixChaine->croix_chaine - $car->compteur + $durerCroit;
                $contpercecr =$durerCroit/100;
                $perceCroit = $contCroit/$contpercecr;
            @endphp

        <span class="me-2 text-sm font-weight-bold" style="
        color:
            @if($perceCroit > 50)
                rgb(0, {{ (255 * ($perceCroit - 50)) / 50 }}, 0)
            @elseif($perceCroit < 50)
                rgb({{ (255 * (50 - $perceCroit)) / 50 }}, 0, 0)
            @else
                black
            @endif">
            {{ $contCroit }}aaa
        </span>
                @break
                @endif
                @endforeach
    </span>
                <span class="me-2 text-sm font-weight-bold d-none">
                    @php
                        $PdurerCroit = 50000;
                        $PcontCroit = $PdurerCroit - $car->compteur;
                        $Pcontpercecr =$PdurerCroit/100;
                        $perceCroit = $PcontCroit/$Pcontpercecr;
                    @endphp
                {{$PcontCroit}}
                </span>
    </div>
    <div>
        <div class="progress mx-auto">
        <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$perceCroit}}%;"></div>
        </div>
    </div>
    <div>
        <span class="text-xs font-weight-bold valueCroit change_croit">
            @foreach ($croixChaines as $croixChaine)
            @if ($croixChaine->car_id == $car->id)
                    {{$croixChaine->croix_chaine}}
            @break
            @endif
            @endforeach
        </span>
    </div>
    </div>
</td>