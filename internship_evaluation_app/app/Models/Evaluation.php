<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'hardskill_problemsolving',
        'hardskill_functioneleanalyse',
        'hardskill_inzichtprojectscopes',
        'hardskill_frontendtoepassingen',
        'hardskill_backendtoepassingen',
        'hardskill_gitversiecontrole',
        'hardskill_terminalskills',
        'hardskill_agilescrum',
        'hardskill_deployment',
        'hardskill_rapportagecommunicatieskills',
        'softskill_professioneelvoorkomen',
        'softskill_stiptheid',
        'softskill_orde',
        'softskill_assertiviteit',
        'softskill_doorzettingsvermogen',
        'softskill_leergierigheid',
        'softskill_communicatiedurftvragenstellen',
        'softskill_luisterendoornaarstandpuntvananderen',
        'softskill_aangepastnonverbalecommunicatie',
        'softskill_deeltzijnkennis',
        'softskill_flexibiliteit',
        'softskill_concentreertzichopverschillendetaken',
        'softskill_gaatvlotommetwisselendewerkomstandigheden',
        'softskill_klantgerichtheidinternalsextern',
        'softskill_reageertvriendelijkencorrectopvragenvancollegasklanten',
        'softskill_begrijptdenodenvandeklant',
        'softskill_isdiscreet',
        'softskill_efficientiekanprioriteitenbepalen',
        'softskill_streefternaarzijnhaarprestatiesteverbeteren',
        'softskill_zelfstandigwerkenkaneentaakzelfstandiguitvoeren',
        'softskill_werktkwalitatief',
        'softskill_kanprobleemoplossendwerken',
        'softskill_reflectiekijktkritischnaareigenhandelingenenstuurtbijwaarnodig',
        'softskill_verwerftinformatieomtoekomstigetakencorrectuittevoeren',
        'good_experiences',
        'areas_for_improvement',
        'mentor_comments',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
