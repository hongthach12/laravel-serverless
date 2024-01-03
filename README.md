## Requirement

Manual create AWS Codecommit with repo name test-lar-serverless

## CICD

### create Codepipe for develop env ( with git branch develop )
```
sam deploy -t codepipeline.yaml --stack-name develop --parameter-overrides="FeatureGitBranch=develop CodeCommitRepositoryName=test-lar-serverless StackLaravelName=laravel-develop" --region us-east-1

```
this cicd will be automatic deploy serverless with stag develop

- StackLaravelName: stack name of serverless FW

### manual invoke lambda artisan
```
serverless bref:cli --stage=develop -a "{Command name}"

```

### Infra overview
- Api Gw
- Lambda
- PostgreSql
- DynamoDB
- S3
- VPC
- VPC endpoint