<?php

namespace App\Domain\Project;

use App\Domain\Interfaces\ProjectRepositoryInterface;
use App\Models\Project as ProjectModel;
use App\Domain\Project\Project;
use App\Helpers\Result;

class ProjectRepository implements ProjectRepositoryInterface {
    public function extractDataFromEntity(Project $project) {
        return [
            'client' => $project->getClientId(),
            'projectname' => $project->getName(),
            'title' => $project->getContactJobTitle(),
            'industry' => $project->getIndustry(),
            'projecttype' => $project->getType(),
            'durationMonths' => $project->getDurationInMonths(),
            'start_date' => $project->getActivationDate(),
            'cambudget' => $project->getExpectedRevenue(),
            'rating_q1' => $project->getMonitorJobsite(),
            'rating_q2' => $project->getDocumentProject(),
            'rating_q3' => $project->getNeedsHighDefPanoramicCamera(),
            'rating_q4' => $project->getPromoteProjectOnSocialMedia(),
            'rating_q5' => $project->getNeedsSecurityCameras(),
            'site_plan' => $project->getHasSitePlan(),
            'location_type' => $project->getInteriorOrExteriorInstallation(),
            'location' => $project->getSingleOrMultipleLocations(),
            'height' => $project->getHeight(),
            'tallOrWide' => $project->getBuildingTallOrWide(),
            'used_webcam' => $project->getClientHasWebcamExperience(),
            'competitors' => $project->getClientWindowShoppedOtherCameras(),
            'uav' => $project->getNeedsDroneSupport(),
            'pm' => $project->getprojectManagementSoftware(),
            'band_avail' => $project->getJobsiteNetworkCapacity(),
            'site_power' => $project->getJobsitePowerSourceCapacity(),
            'needMovableCameras' => $project->getNeedMovableCameras(),
            'gender' => $project->getProjectContactGender(),
            'decision_maker' => $project->getProjectContactMakesDecisions(),
            'lead' => $project->getReferralSource(),
            'installer' => $project->getRequestedProfessionalInstaller(),
            'owner' => $project->getOwner(),
            'clientPartners' => $project->getClientPartners(),
            'developer' => $project->getDeveloper(),
            'notes' => $project->getNotes()
        ];
    }

    public function save(Project $project): Result {
        $data = $this->extractDataFromEntity($project);
        $success = ProjectModel::create($data);

        if ($success) {
            return Result::ok($success);
        }

        return Result::fail('Failed to save Project to DB');
    }
}

?>