<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CarbonLique;
use App\Models\Constant;
use App\Models\Parameter;
use App\Models\CouncilOffice;
use App\Models\CodeNaf;
use App\Models\ActivityCode;
use App\Models\RefundBoard;
use App\Models\ReducedTaxBoard;
use App\Models\MeterPremeter;
use App\Models\RefundTCGN;
use App\Models\RefundCSPE;
use App\Models\Company;
use App\Models\Responsible;
use App\Models\Contact;
use App\Models\Site;
use App\Models\Study;
use App\Models\GazMeter;
use App\Models\GazContract;
use App\Models\GazBill;
use App\Models\ElecMeter;
use App\Models\ElecContract;
use App\Models\ElecBill;
use App\Models\BaseFolder;
use App\Models\BaseDocument;
use App\Models\GenFolder;
use App\Models\Supplier;
use App\Models\Alerte;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\EligibilityCSPE;
use App\Models\EligibilityTCGN;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        User::factory(20)->create();
        CarbonLique::factory(20)->create();
        Constant::factory(20)->create();
        Parameter::factory(20)->create();
        CouncilOffice::factory(20)->create();
        CodeNaf::factory(20)->create();
        ActivityCode::factory(20)->create();
        Company::factory(20)->create();
        MeterPremeter::factory(20)->create();
        Responsible::factory(20)->create();
        Contact::factory(20)->create();
        Site::factory(20)->create();
        Study::factory(20)->create();
        RefundTCGN::factory(20)->create();
        RefundCSPE::factory(20)->create();
        GazMeter::factory(20)->create();
        GazContract::factory(20)->create();
        GazBill::factory(20)->create();
        ElecMeter::factory(20)->create();
        ElecContract::factory(20)->create();
        ElecBill::factory(20)->create();
        BaseFolder::factory(20)->create();
        BaseDocument::factory(20)->create();
        GenFolder::factory(20)->create();
        Supplier::factory(20)->create();
        Alerte::factory(20)->create();
        RefundBoard::factory(20)->create();
        ReducedTaxBoard::factory(20)->create();
        EligibilityCSPE::factory(20)->create();
        EligibilityTCGN::factory(20)->create();
    }
}
