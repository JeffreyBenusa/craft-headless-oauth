<?php

namespace jeffbenusa\headlessoauth\controllers;

use Craft;
use craft\web\Controller;
use yii\web\Response;
use yii\web\BadRequestHttpException;
use yii\web\UnauthorizedHttpException;

class AuthController extends Controller
{
    /**
     * Allow anonymous access to all endpoints in this controller.
     */
    protected int|bool|array $allowAnonymous = true;
    
    /**
     * Login a user via credentials or token
     * POST /actions/headless-oauth/auth/
     */
    public function actionIndex(): Response
    {
        return $this->asJson([
            'success' => true,
            'message' => 'Successful routing to Auth Controller.'
        ]);
    }
    
    /**
     * Login a user via credentials or token
     * POST /actions/headless-oauth/auth/login
     */
    public function actionLogin(): Response
    {
        // TODO: Validate credentials or access token (email, password, etc.)
        // TODO: Look up user and verify credentials
        // TODO: Return access token and optional user info
        
        return $this->asJson([
            'success' => true,
            'message' => 'Login successful.',
            'token' => 'placeholder_token',
        ]);
    }
    
    /**
     * Register a new user
     * POST /actions/headless-oauth/auth/register
     */
    public function actionRegister(): Response
    {
        // TODO: Validate input (email, password, name, etc.)
        // TODO: Create new user and save
        // TODO: Optionally send activation or confirmation
        
        return $this->asJson([
            'success' => true,
            'message' => 'Registration successful.',
            'userId' => 1234, // placeholder
        ]);
    }
    
    /**
     * Refresh an expired access token using a refresh token
     * POST /actions/headless-oauth/auth/refresh-token
     */
    public function actionRefreshToken(): Response
    {
        // TODO: Validate refresh token
        // TODO: Issue new access token
        // TODO: Return new token (and optionally new refresh token)
        
        return $this->asJson([
            'success' => true,
            'message' => 'Token refreshed.',
            'token' => 'new_placeholder_token',
        ]);
    }
    
    /**
     * Logout the user (invalidate session/token)
     * POST /actions/headless-oauth/auth/logout
     */
    public function actionLogout(): Response
    {
        // TODO: Invalidate token or session if using stateless tokens
        // TODO: Log out user or clear token client-side
        
        return $this->asJson([
            'success' => true,
            'message' => 'Logout successful.',
        ]);
    }
}