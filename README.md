## Requirement
create role name: pipeline-execution-role for codebuild and fullaccess

## CICD


### create Codepipe for develop env ( with git branch develop )
sam deploy -t codepipeline.yaml --stack-name develop --parameter-overrides="FeatureGitBranch=develop CodeCommitRepositoryName=test-lar-serverless StackLaravelName=laravel-develop" --region us-east-1


- StackLaravelName: stack name of serverless FW

### manual invoke lambda artisan

serverless bref:cli --stage=develop -a "{Command name}"