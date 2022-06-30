<?php
// Database seeder data
return [
    'document_types' => ['Contract', 'License Agreement', 'EULA', 'Other'],
    'task_statuses' => ['Not Started', 'Started', 'Completed', 'Cancelled'],
    'task_types' => ['Task', 'Meeting', 'Phone call'],
    'lead_status' => ['New', 'Opportunity', 'Customer', 'Close'],
    'settings' => ['crm_email' => 'george@web2web.co.za', 'enable_email_notification' => 1],
    'permissions' => [
        'create_lead', 'edit_lead', 'delete_lead', 'list_leads', 'view_lead', 'assign_lead',
        'create_document', 'edit_document', 'delete_document', 'list_documents', 'view_document', 'assign_document',
        'create_task', 'edit_task', 'delete_task', 'list_tasks', 'view_task', 'assign_task', 'update_task_status', 
        'edit_profile', 'compose_email', 'list_emails', 'view_email', 'toggle_important_email', 'trash_email', 'send_email',
        'reply_email', 'forward_email', 'show_email_notifications', 'show_calendar'
    ],
    'mailbox_folders' => array(
        array("title"=>"Inbox", "icon" => "fa fa-inbox"),
        array("title"=>"Sent", "icon" => "fa fa-envelope-o"),
        array("title"=>"Drafts", "icon" => "fa fa-file-text-o"),
        array("title"=>"Trash", "icon" => "fa fa-trash-o")
    )
];