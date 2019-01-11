<?php

use Illuminate\Database\Seeder;

class SiafDomainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // IND_ST_ATIVO_INATIVO
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_st_ativo_inativo',
            'desc_code' => '0',
            'desc_status' => 'Inativo',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_st_ativo_inativo',
            'desc_code' => '1',
            'desc_status' => 'Ativo',
            'ind_st_domain' => '1',
        ]);
        // IND_TP_PROFILE
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_profile',
            'desc_code' => '1',
            'desc_status' => 'Administrators',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_profile',
            'desc_code' => '2',
            'desc_status' => 'Managers',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_profile',
            'desc_code' => '3',
            'desc_status' => 'Supervisors',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_profile',
            'desc_code' => '4',
            'desc_status' => 'Users',
            'ind_st_domain' => '1',
        ]);
        // IND_TP_NOTIFICATION
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_notification',
            'desc_code' => '0',
            'desc_status' => 'Tarefa',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_notification',
            'desc_code' => '1',
            'desc_status' => 'Notificação',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_notification',
            'desc_code' => '2',
            'desc_status' => 'Mensagem',
            'ind_st_domain' => '1',
        ]);
        // IND_ST_NOTIFICATION
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_st_notification',
            'desc_code' => '0',
            'desc_status' => 'Não lido',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_st_notification',
            'desc_code' => '1',
            'desc_status' => 'Lido',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_st_notification',
            'desc_code' => '2',
            'desc_status' => 'Excluído',
            'ind_st_domain' => '1',
        ]);
        // IND_TP_CRON_JOB
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_cron_job',
            'desc_code' => '01',
            'desc_status' => 'Uma vez',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_cron_job',
            'desc_code' => '02',
            'desc_status' => 'A cada 5 min',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_cron_job',
            'desc_code' => '03',
            'desc_status' => 'A cada 10 min',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_cron_job',
            'desc_code' => '04',
            'desc_status' => 'A cada 30 min',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_cron_job',
            'desc_code' => '05',
            'desc_status' => 'A cada 1h',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_cron_job',
            'desc_code' => '06',
            'desc_status' => 'A cada 2h',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_cron_job',
            'desc_code' => '07',
            'desc_status' => 'A cada 12h',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_cron_job',
            'desc_code' => '96',
            'desc_status' => 'Diário',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_cron_job',
            'desc_code' => '97',
            'desc_status' => 'Mensal',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_cron_job',
            'desc_code' => '98',
            'desc_status' => 'Semanal',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_cron_job',
            'desc_code' => '99',
            'desc_status' => 'Anual',
            'ind_st_domain' => '1',
        ]);
        // IND_TP_DEPARTMENT
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_department',
            'desc_code' => '1',
            'desc_status' => 'Type 1',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_department',
            'desc_code' => '2',
            'desc_status' => 'Type 2',
            'ind_st_domain' => '1',
        ]);
        // IND_TP_OFFICE
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_office',
            'desc_code' => '1',
            'desc_status' => 'Type 1',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_office',
            'desc_code' => '2',
            'desc_status' => 'Type 2',
            'ind_st_domain' => '1',
        ]);
        // IND_FNC_ACCOUNT_PLAN
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_fnc_account_plan',
            'desc_code' => '1',
            'desc_status' => 'Function 1',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_fnc_account_plan',
            'desc_code' => '2',
            'desc_status' => 'Function 2',
            'ind_st_domain' => '1',
        ]);
        // IND_TP_ACCOUNT_PLAN
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_account_plan',
            'desc_code' => '1',
            'desc_status' => 'Type 1',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_account_plan',
            'desc_code' => '2',
            'desc_status' => 'Type 2',
            'ind_st_domain' => '1',
        ]);
        // IND_TP_BUDGET
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_budget',
            'desc_code' => '1',
            'desc_status' => 'Type 1',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_budget',
            'desc_code' => '2',
            'desc_status' => 'Type 2',
            'ind_st_domain' => '1',
        ]);
        // IND_BUDGET_RESTRICT
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_budget_restrict',
            'desc_code' => '1',
            'desc_status' => 'Restrict 1',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_budget_restrict',
            'desc_code' => '2',
            'desc_status' => 'Restrict 2',
            'ind_st_domain' => '1',
        ]);
        // IND_TP_CUSTOMER
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_customer',
            'desc_code' => '1',
            'desc_status' => 'Person Physical',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_customer',
            'desc_code' => '2',
            'desc_status' => 'Person Legal',
            'ind_st_domain' => '1',
        ]);
        // IND_EDUCATION
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_education',
            'desc_code' => '1',
            'desc_status' => 'Basic Education',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_education',
            'desc_code' => '2',
            'desc_status' => 'Medium Education',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_education',
            'desc_code' => '3',
            'desc_status' => 'High Education',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_education',
            'desc_code' => '4',
            'desc_status' => 'Master Education',
            'ind_st_domain' => '1',
        ]);
        // IND_GENDER
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_gender',
            'desc_code' => '1',
            'desc_status' => 'Male',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_gender',
            'desc_code' => '2',
            'desc_status' => 'Female',
            'ind_st_domain' => '1',
        ]);
        // IND_MARITAL_STATUS
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_marital_status',
            'desc_code' => '1',
            'desc_status' => 'Single',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_marital_status',
            'desc_code' => '2',
            'desc_status' => 'Married',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_marital_status',
            'desc_code' => '3',
            'desc_status' => 'Divorced',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_marital_status',
            'desc_code' => '4',
            'desc_status' => 'Widowed',
            'ind_st_domain' => '1',
        ]);
        // IND_OCCUPATION
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_occupation',
            'desc_code' => '1',
            'desc_status' => 'No occupation',
            'ind_st_domain' => '1',
        ]);
        // IND_TP_BANK
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_bank',
            'desc_code' => '1',
            'desc_status' => 'Conta Corrente',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_bank',
            'desc_code' => '2',
            'desc_status' => 'Conta Poupança',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_bank',
            'desc_code' => '3',
            'desc_status' => 'Conta Investimento',
            'ind_st_domain' => '1',
        ]);
        // IND_TP_MEMBER
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_member',
            'desc_code' => '0',
            'desc_status' => 'Batismo',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_member',
            'desc_code' => '1',
            'desc_status' => 'Carta Transferência (Entrada)',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_member',
            'desc_code' => '2',
            'desc_status' => 'Aclamação',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_member',
            'desc_code' => '3',
            'desc_status' => 'Falecimento',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_member',
            'desc_code' => '4',
            'desc_status' => 'Carta Transferência (Saída)',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_member',
            'desc_code' => '5',
            'desc_status' => 'Exclusão',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_member',
            'desc_code' => '6',
            'desc_status' => 'Congregado',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_member',
            'desc_code' => '7',
            'desc_status' => 'Migração',
            'ind_st_domain' => '1',
        ]);
        // IND_TP_MEMBER_OFFICE
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_member_office',
            'desc_code' => '1',
            'desc_status' => 'Presidente',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_member_office',
            'desc_code' => '2',
            'desc_status' => 'Vice-Presidente',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_member_office',
            'desc_code' => '3',
            'desc_status' => 'Gerente',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_member_office',
            'desc_code' => '4',
            'desc_status' => 'Coordenador',
            'ind_st_domain' => '1',
        ]);
        DB::table('siaf_domain')->insert([
            'name_column' => 'ind_tp_member_office',
            'desc_code' => '5',
            'desc_status' => 'Suplente',
            'ind_st_domain' => '1',
        ]);
    }
}

