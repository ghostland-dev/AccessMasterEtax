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

class DatabaseSeeder extends Seeder {
    /**
    * Seed the application's database.
    *
    * @return void
    */

    public function run() {
        User::factory( 10 )->create();
        CarbonLique::factory( 10 )->create();
        Constant::factory( 10 )->create();
        Parameter::factory( 10 )->create();
        CouncilOffice::factory( 10 )->create();
        CodeNaf::factory( 10 )->create();
        ActivityCode::factory( 10 )->create();
        Company::factory( 10 )->create();
        MeterPremeter::factory( 10 )->create();
        Responsible::factory( 10 )->create();
        Contact::factory( 10 )->create();
        Site::factory( 10 )->create();
        Study::factory( 10 )->create();
        RefundTCGN::factory( 10 )->create();
        RefundCSPE::factory( 10 )->create();
        GazMeter::factory( 10 )->create();
        GazContract::factory( 10 )->create();
        GazBill::factory( 10 )->create();
        ElecMeter::factory( 10 )->create();
        ElecContract::factory( 10 )->create();
        ElecBill::factory( 10 )->create();
        BaseFolder::factory( 10 )->create();
        BaseDocument::factory( 10 )->create();
        GenFolder::factory( 10 )->create();
        Supplier::factory( 10 )->create();
        Alerte::factory( 10 )->create();
        RefundBoard::factory( 10 )->create();
        ReducedTaxBoard::factory( 10 )->create();

    }
}