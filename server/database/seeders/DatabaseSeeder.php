<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Project;
use App\Models\Role;
use App\Models\Section;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        # users
        $userAdmin = User::factory()->make();
        $userAdmin->name = '管理者ユーザー';
        $userAdmin->email = 'admin@example.com';
        $userAdmin->save();

        $userGeneral = User::factory()->make();
        $userGeneral->name = '一般ユーザー';
        $userGeneral->email = 'general@example.com';
        $userGeneral->save();

        # team
        $team = new Team();
        $team->title = 'テストチーム';
        $team->save();
        
        # team_user
        $userAdmin->teams()->attach($team->id, ['role' => \App\Enums\Role::Admin]);
        $userGeneral->teams()->attach($team->id, ['role' => \App\Enums\Role::General]);

        # projects
        $project = new Project();
        $project->title = 'テストプロジェクト';
        $project->color = \App\Enums\ProjectColor::Blue;
        $team->projects()->save($project);

        # sections
        $section = new Section();
        $section->title = 'テストセクション';
        $project->sections()->save($section);

        # tasks
        $task = new Task();
        $task->title = 'テストタスク';
        $task->status = \App\Enums\TaskStatus::Todo;
        $section->tasks()->save($task);

        # task_user
        $task->users()->attach($userGeneral->id);

        # comment
        $comment = new Comment();
        $comment->text = 'テストコメント';
        $comment->user_id = $userGeneral->id;
        $task->comments()->save($comment);
    }
}
