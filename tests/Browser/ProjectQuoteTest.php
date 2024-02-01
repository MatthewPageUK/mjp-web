<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\ProjectQuote;
use Tests\DuskTestCase;

class ProjectQuoteTest extends DuskTestCase
{
    public function test_has_title(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ProjectQuote);
            $this->assertEquals('Project Quote', $browser->text('@title'));
        });
    }
    public function test_has_intro_text(): void { $this->assertFalse(true); }
    public function test_has_link_to_availability_page(): void { $this->assertFalse(true); }
    public function test_has_form_field_first_name(): void { $this->assertFalse(true); }
    public function test_has_form_field_surname(): void { $this->assertFalse(true); }
    public function test_has_form_field_telephone(): void { $this->assertFalse(true); }
    public function test_has_form_field_email(): void { $this->assertFalse(true); }
    public function test_has_form_field_company(): void { $this->assertFalse(true); }
    public function test_has_form_field_project_description(): void { $this->assertFalse(true); }
    public function test_has_form_field_budget(): void { $this->assertFalse(true); }
    public function test_has_form_field_start_date(): void { $this->assertFalse(true); }
    public function test_has_form_field_estimated_duration(): void { $this->assertFalse(true); }
    public function test_has_form_field_skills(): void { $this->assertFalse(true); }
    public function test_has_submit_button(): void { $this->assertFalse(true); }
    public function test_has_reset_button(): void { $this->assertFalse(true); }
    public function test_has_thank_you_message(): void { $this->assertFalse(true); }
    public function test_has_error_messages(): void { $this->assertFalse(true); }
    public function test_form_field_first_name_is_required(): void { $this->assertFalse(true); }
    public function test_form_field_email_is_required(): void { $this->assertFalse(true); }
    public function test_form_field_project_description_is_required(): void { $this->assertFalse(true); }
    public function test_form_field_start_date_is_datepicker(): void { $this->assertFalse(true); }
    public function test_form_field_skills_has_skills_list(): void { $this->assertFalse(true); }
    public function test_message_is_passed_to_message_service(): void { $this->assertFalse(true); }

}
