<?php

namespace App\Http\Controllers;

use App\Domain\Interfaces\BaseRepoistory;
use App\Domain\Interfaces\ProjectRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\ProjectController;
use App\Models\Address;
use App\Domain\Project\Project;
use App\Domain\Project\ProjectRepoistory as ProjectRepoistory;
use Exception;

class ProjectProfileHandler extends Controller
{
    private $projectRepository;
    public function __construct(ProjectRepositoryInterface $projRepository) {
        $this->projectRepository = $projRepository;
    }

    /**
     * Handles the creation of a project profile.
     */
    public function handleProjectProfileCreation(Request $request) {
        //$projectController = new ProjectController();

        $projectOrError = Project::create($request->all());
        if ($projectOrError->isFailure) {
            return response([
                'error' => $projectOrError->error
            ], 400);
        }
        /** @var Project $project */
        $project = $projectOrError->getValue();
    }
}
