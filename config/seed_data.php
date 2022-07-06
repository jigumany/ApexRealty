<?php
// Database seeder data
return [
    'document_types' => ['Contract', 'License Agreement', 'EULA', 'Other'],
    'task_statuses' => ['Not Started', 'Started', 'Completed', 'Cancelled'],
    'task_types' => ['Task', 'Meeting', 'Phone call'],
    'lead_status' => ['New', 'Opportunity', 'Customer', 'Close'],
    'settings' => ['crm_email' => 'george@web2web.co.za', 'enable_email_notification' => 1],
    'mailbox_folders' => array(
        array("title"=>"Inbox", "icon" => "fa fa-inbox"),
        array("title"=>"Sent", "icon" => "fa fa-envelope-o"),
        array("title"=>"Drafts", "icon" => "fa fa-file-text-o"),
        array("title"=>"Trash", "icon" => "fa fa-trash-o")
    )
];