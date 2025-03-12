<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case CRM_STATUS  = 'crm_status';
    case CRM_GROUP  = 'crm_group';
    case CRM_SOURCE  = 'crm_source';
    case CRM_LEAD_SHOW  = 'crm_lead_show';
    case CRM_LEAD_OPERATION  = 'crm_lead__operation';
    case CRM_LEAD_DELETE  = 'crm_lead_delete';
    case CRM_CUSTOMER  = 'crm_customer';
    case CRM_TEAM  = 'crm_teams';
    case CRM_ACTIVIY_SHOW  = 'crm_activiy_show';
    case CRM_ACTIVIY_OPERATION  = 'crm_activiy_operation';
    case CRM_ACTIVIY_DELETE  = 'crm_activiy_delete';
    case CRM_ACTIVIY_NOTE  = 'crm_activiy_note';
    case CRM_ACTIVIY_MEETING  = 'crm_activiy_meeting';


    public function label(): string
    {
        return match ($this) {
            static::CRM_STATUS =>   'CRM/Status',
            static::CRM_GROUP =>     'CRM/Group',
            static::CRM_SOURCE =>   'CRM/Source',
            static::CRM_LEAD_SHOW =>     'CRM/Lead/Show',
            static::CRM_LEAD_SHOW =>     'CRM/Lead/Operation',
            static::CRM_LEAD_SHOW =>     'CRM/Lead/Delete',
            static::CRM_CUSTOMER => 'CRM/Customer',
            static::CRM_TEAM =>    'CRM/Teams',
            static::CRM_ACTIVIY_SHOW =>    'CRM/Activiy/Show',
            static::CRM_ACTIVIY_OPERATION =>    'CRM/Activiy/Operation',
            static::CRM_ACTIVIY_DELETE =>    'CRM/Activiy/Delete',
            static::CRM_ACTIVIY_NOTE =>    'CRM/Activiy/Note',
            static::CRM_ACTIVIY_MEETING =>    'CRM/Activiy/Meeting',
        };
    }
}
