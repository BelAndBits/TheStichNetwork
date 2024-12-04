<?php declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Project;

final class ProjectRepository
{
    /**
     * The advantage of this approach is that you can encapsulate all the methods related to
     * fetching or writing on the database. It's clean and scalable.
     *
     * Nevertheless, if you lean towards a simpler approach, you can place this code in the controller and it will
     * work the same way.
     */
    public function all(): array
    {
        return Project::all()->all();
    }
}
