<?php

namespace App\Enums;

enum GithubIcon: string
{
    case Star       = 'star';
    case Watch      = 'visibility';
    case Home       = 'home_work';
    case Clone      = 'folder_copy';
    case Bug        = 'bug_report';
    case Fix        = 'build';
    case Suggestion = 'lightbulb';
    case Readme     = 'local_library';
    case Task       = 'task';
    case PR         = 'compare_arrows';
    case Chat       = 'forum';
    case Error      = 'sync_problem';
    case Loading    = 'sync';
}
