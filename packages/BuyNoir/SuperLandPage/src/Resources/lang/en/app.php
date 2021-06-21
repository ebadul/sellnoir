<?php

return [
    'super-user' => [
        'common' => [
            'host'      => 'The :attribute must be valid.',
            'code'      => 'The :attribute must be valid.',
        ],

        'layouts' => [
            'locale'            => 'Super Locale',
            'super-admin'       => 'Super admin',
            'account'           => 'Account',
            'menu'              => [
                    'view-front'    => 'View Front',
                    'account'       => 'Account',
                    'logout'        => 'Logout'
                ],
            'left-menu'         => [
                    'tenants'           => 'Tenants',
                    'tenant-customers'  => 'Tenant\'s Customers',
                    'tenant-products'   => 'Tenant\'s Products',
                    'tenant-orders'     => 'Tenant\'s Orders',
                    'settings'          => 'Settings',
                    'agents'            => 'Super Agents',
                    'locales'           => 'Super Locales',
                    'currencies'        => 'Super Currencies',
                    'channels'          => 'Super Channels',
                    'exchange-rates'    => 'Currency Exchange Rate',
                    'configurations'    => 'Configure',
                    'general'           => 'General',
                ],
        ],

        'datagrid' => [
            'id'            => 'ID',
            'code'          => 'Code',
            'name'          => 'Name',
            'first-name'    => 'First Name',
            'last-name'     => 'Last Name',
            'hostname'      => 'Hostname',
            'email'         => 'Email',
            'direction'     => 'Direction',
            'domain'        => 'Domain',
            'cname'         => 'Cname',
            'currency-name' => 'Currency Name',
            'exch-rate'     => 'Exchange Rate',
            'status'        => 'Status',
            'position'      => 'Position',
            'active'        => 'Active',
            'inactive'      => 'Inactive',
            'actions'       => 'Actions',
            'tenant-name'   => 'Tenant',
            'customer-name' => 'Customer Name',
            'group'         => 'Customer Group',
            'phone'         => 'Phone',
            'sku'           => 'SKU',
            'attribute-family'  => 'Attribute Family',
            'type'          => 'Type',
            'price'         => 'Price',
            'qty'           => 'Quantity',
            'sub-total'     => 'Sub Total',
            'grand-total'   => 'Grand Total',
            'order-date'    => 'Order Date',
            'channel-name'  => 'Channel Name',
            'billed-to'     => 'Billed To',
            'shipped-to'    => 'Shipped To',
        ],

        'tenants' => [
            'title'                 => 'Tenants List',
            'edit-title'            => 'Edit Tenant Detail',
            'view-title'            => 'Tenant\'s Insights',
            'name'                  => 'Name',
            'email'                 => 'Email Address',
            'domain'                => 'Domain',
            'cname'                 => 'Cname',
            'status'                => 'Status',
            'activate'              => 'Activate',
            'deactivate'            => 'Deactivate',
            'activated'             => 'Activated',
            'deactivated'           => 'DeActivated',
            'btn-update'            => 'Update Details',
            'no-of-products'        => 'No. Of Products',
            'no-of-attributes'      => 'No. Of Attributes',
            'no-of-customers'       => 'No. Of Customers',
            'no-of-customer-groups' => 'No. Of Customer Groups',
            'no-of-categories'      => 'No. Of Categories',
            'mapped-domain'         => 'Mapped Domain',
            'view'                  => 'View Tenant Insights',
            'edit'                  => 'Modify Tenant',
            'delete'                => 'Remove Tenant',
            'mass-delete'           => 'Mass Delete',
           
            'customers' => [
                'title' => 'Customers List',
            ],
            'products' => [
                'title' => 'Products List',
            ],
            'orders' => [
                'title' => 'Orders List',
            ],
        ],

        'config' => [
            'system' => [
                'general'           => 'General',
                'footer'            => 'Footer',
                'content'           => 'Content',
                'footer-content'    => 'Footer Text',
                'footer-toggle'     => 'Toggle footer',
                'design'            => 'Design',
                'admin-logo'        => 'Admin Logo',
                'logo-image'        => 'Logo Image',
                'all-channels'      => 'All',
                'all-locales'       => 'All',
                'super-agent'       => 'Super Agent',
                'email-address'     => 'Email Address',
                'sales'             => 'Sales',
                'shipping-methods'  => 'Shipping Methods',
            ]
        ],
    
        'settings'  => [
            'agents'    => [
                'title'                     => 'Agents List',
                'add-title'                 => 'Add Agent',
                'edit-title'                => 'Edit Agent',
                'save-btn-title'            => 'Save Agent',
                'general'                   => 'General',
                'status-and-role'           => 'Status',
                'first-name'                => 'First Name',
                'last-name'                 => 'Last Name',
                'email'                     => 'Email',
                'old-password'              => 'Old Password',
                'password'                  => 'Password',
                'new-password'              => 'New Password',
                'current-password'          => 'Current Password',
                'role'                      => 'Role',
                'status'                    => 'Status',
                'account-is-active'         => 'Account is Active',
                'confirm-password'          => 'Confirm New Password',
                'confirm-delete-title'      => 'Confirm Your Password',
                'confirm-delete'            => 'Confirm Delete This Account',
                'create-success'            => 'Success: Super admin agent created successfully.',
                'update-success'            => 'Success: Super admin agent updated successfully.',
                'delete-success'            => 'Success: Super admin agent deleted successfully.',
                'last-delete-error'         => 'Warning: At least one super admin agent is required.',
                'error-password-not-match'  => 'Warning: You are provided wrong password, try again.',
                'delete-failed'             => 'Warning: Error encountered while deleting super admin agent.',

                'sign-in'   => [
                    'title'                 => 'Super Admin Sign In',
                    'email'                 => 'Email Address',
                    'password'              => 'Password',
                    'btn-submit'            => 'Sign In',
                    'forget-password-link-title' => 'Forget Password?',
                    'forget-password'       => [
                        'title'                 => 'Forget Password',
                        'header-title'          => 'Recover Password',
                        'email'                 => 'Registered Email',
                        'submit-btn-title'      => 'Email Password Reset Link',
                        'back-link-title'       => 'Back To Sign In',
                    ],
                    'reset-password'        => [
                        'title'                 => 'Reset Password',
                        'email'                 => 'Registered Email',
                        'password'              => 'New Password',
                        'confirm-password'      => 'Confirm Password',
                        'submit-btn-title'      => 'Reset Password',
                        'back-link-title'       => 'Back to Sign In'
                    ],
                    'login-success'         => 'Success: You have logged in successfully.',
                    'login-error'           => 'Please check your credentials and try again.',
                ],
            ],

            'locales'   => [
                'title'             => 'Locales',
                'add-title'         => 'Add Locale',
                'edit-title'        => 'Edit Locale',
                'save-btn-title'    => 'Save Locale',
                'general'           => 'General',
                'code'              => 'Code',
                'name'              => 'Name',
                'direction'         => 'Direction',
                'create-success'    => 'Success: Super admin locale created successfully.',
                'update-success'    => 'Success: Super admin locale updated successfully.',
                'delete-success'    => 'Success: Super admin locale deleted successfully.',
                'last-delete-error' => 'Warning: At least one super admin locale is required.',
            ],

            'currencies'    => [
                'title'             => 'Currencies',
                'add-title'         => 'Add Currency',
                'edit-title'        => 'Edit Currency',
                'save-btn-title'    => 'Save Currency',
                'general'           => 'General',
                'code'              => 'Code',
                'name'              => 'Name',
                'symbol'            => 'Currency Symbol',
                'create-success'    => 'Success: Super admin currency created successfully.',
                'update-success'    => 'Success: Super admin currency updated successfully.',
                'delete-success'    => 'Success: Super admin currency deleted successfully.',
                'last-delete-error' => 'Warning: At least one super admin currency is required.',
            ],

            'exchange-rates'    => [
                'title'             => 'Currency Exchange Rates List',
                'add-title'         => 'Add Exchange Rate',
                'edit-title'        => 'Edit Exchange Rate',
                'save-btn-title'    => 'Save Exchange Rates',
                'general'           => 'General',
                'source_currency'   => 'Source Currency',
                'target_currency'   => 'Target Currency',
                'rate'              => 'Rate',
                'create-success'    => 'Success: Currency exchange rate created successfully.',
                'update-success'    => 'Success: Currency exchange rate updated successfully.',
                'delete-success'    => 'Success: Currency exchange rate deleted successfully.',
                'last-delete-error' => 'Warning: At least one currency exchange rate is required.',
            ],

            'channels'  => [
                'title'                 => 'Super Channels List',
                'edit-title'            => 'Edit Super Channel',
                'delete'                => 'Delete',
                'btn-save'              => 'Save Channel',
                'general'               => 'General',
                'currencies-and-locales'=> 'Currencies and Locales',
                'design'                => 'Design',
                'home-page-seo'         => 'Home page SEO',
                'code'                  => 'Code',
                'name'                  => 'Name',
                'hostname'              => 'Hostname',
                'locales'               => 'Locales',
                'default-locale'        => 'Default Locale',
                'currencies'            => 'Currencies',
                'default-currency'      => 'Default Currency',
                'home-page-content'     => 'Home Page Content',
                'footer-page-content'   => 'Footer Content',
                'logo'                  => 'Logo',
                'favicon'               => 'Favicon',
                'meta-title'            => 'Meta Title',
                'meta-keywords'         => 'Meta Keywords',
                'meta-description'      => 'Meta Description',
                'create-success'        => 'Success: Super channel successfully created.',
                'update-success'        => 'Success: Super channel successfully updated.'
            ]
        ],

        'configurations'    => [
            'title'                     => 'Configuration',
            'save-btn-title'            => 'Save',
            'yes'                       => 'Yes',
            'no'                        => 'No',
            'delete'                    => 'Delete',
            'save-message'              => 'Success: Super admin configuration saved successfully.',
        ],

        'mail' => [
            'dear'                  => 'Dear :agent_name',
            'agent-registration'    => 'Saas Agent Registered Successfully',
            'summary'               => 'Your account has been created. Your account details are below: ',
            'saas-url'              => 'Domain',
            'email'                 => 'Email',
            'password'              => 'Password',
            'sign-in'               => 'SignIn',
            'thanks'                => 'Thanks!',
        ],
    ],
    
    'tenant' => [
        'layouts' => [
            'nav-top' => [
                'menu' => [
                    'account'        => 'Account',
                    'company-signup' => 'Register Tenant',
                ]
            ]
        ],

        'footer' => [
            'locale'                => 'LOCALE',
        ],

        'registration' => [
            'merchant-auth'         =>'Merchant Registration',
            'step-1'                => 'Step 1',
            'auth-cred'             => 'Authentication Credentials',
            'email'                 => 'Email',
            'phone'                 => 'Phone',
            'username'              => 'Store Name',
            'password'              => 'Password',
            'cpassword'             => 'Confirm Password',
            'continue'              => "Let's do this",
            'signin-next'              => "Find Your Shop",
            'signin-now'              => "Signin Now",
            'next'                  => "Ok, Next",
            'create-store'          => "Create Store",
            'visit-shop'          => "Visit Shop",
            'login-admin'          => "Admin Login",
            'step-2'                => 'Step 2',
            'personal'              => 'Personal Details',
            'first-name'            => 'First Name',
            'last-name'             => 'Last Name',
            'step-3'                => 'Step 3',
            'org-details'           => 'Organization Details',
            'congrats-title'        => 'Congrats',
            'congrats-subtitle'     => "You're shop is created",
            'congrats-description'  => 'Check your email inbox for next steps',
            'org-name'              => 'What do you sell?',
            'else-business'         => 'Are you just starting? Or are you moving your business from elsewhere?',
            'just-start'            => 'Just starting',
            'else-moving'           => 'Already established and moving my stuff here',
            'company-activated'     => 'Success: Company successfully activated.',
            'company-deactivated'   => 'Success: Company successfully deactivated.',
            'company-updated'       => 'Success: Company Updated Successfully.',
            'something-wrong'       => 'Warning: Something went wrong.',
            'store-created'         => 'Success: Store Created Successfully.',
            'something-wrong-1'     => 'Warning: Something went wrong, please try again later.',
        ],

        'custom-errors' => [
            'channel-creating'  => 'Warning: Creating more than one channel is not allowed',
            'channel-hostname'  => 'Warning: Kindly contact admin to change your hostname',
            'same-domain'       => 'Warning: Cannot keep same sub-domain as main domain',
            'block-message'     => 'Warning: If you want to unblock this seller, free feel to contact us we are available 24x7 to solve your issue.',
            'blocked'           => 'has been blocked',
            'illegal-action'    => 'Warning: You have performed an illegal action',
            'not-allowed-to-visit'  => 'Warning: You are not allowed to visit this section, this section is only meant for usage by admins only',
            'domain-message'    => 'Warning: Oops! We could not help at <b>:domain</b>',
            'domain-desc'       => 'If you wish to create an account with <b>:domain</b>
            as an organization, feel free to create an account and get started.',
            'illegal-message'   => 'Warning: The action you performed is disabled by site admin, kindly mail your site administrator for more details on this.',
            'locale-creation'   => 'Warning: Creating locale other than English is not allowed.',
            'locale-delete'     => 'Warning: Cannot delete the Locale.',
            'cannot-delete-default' => 'Warning: Cannot delete the default channel.',
        ],
    ],

    'admin' => [
        'system'    => [
            'social-login'          => 'Social Login',
            'facebook'              => 'Facebook Settings',
            'facebook-client-id'    => 'Facebook Client ID',
            'facebook-client-secret'=> 'Facebook Client Secret',
            'facebook-callback-url' => 'Facebook Callback URL',
            'twitter'               => 'Twitter Settings',
            'twitter-client-id'     => 'Twitter Client ID',
            'twitter-client-secret' => 'Twitter Client Secret',
            'twitter-callback-url'  => 'Twitter Callback URL',
            'google'                => 'Google Settings',
            'google-client-id'      => 'Google Client ID',
            'google-client-secret'  => 'Google Client Secret',
            'google-callback-url'   => 'Google Callback URL',
            'linkedin'              => 'LinkedIn Settings',
            'linkedin-client-id'    => 'LinkedIn Client ID',
            'linkedin-client-secret'=> 'LinkedIn Client Secret',
            'linkedin-callback-url' => 'LinkedIn Callback URL',
            'github'                => 'GitHub Settings',
            'github-client-id'      => 'GitHub Client ID',
            'github-client-secret'  => 'GitHub Client Secret',
            'github-callback-url'   => 'GitHub Callback URL',
        ],
        'tenant' => [
            'id'                => 'ID',
            'first-name'        => 'First Name',
            'last-name'         => 'Last Name',
            'email'             => 'Email',
            'skype'             => 'Skype',
            'c-name'            => 'CName',
            'add-address'       => 'Add Address',
            'country'           => 'Country',
            'city'              => 'City',
            'address1'          => 'Address 1',
            'address2'          => 'Address 2',
            'address'           => 'Address List',
            'company'           => 'Tenant',
            'profile'           => 'Profile',
            'update'            => 'Update',
            'address-details'   => 'Address Details',
            'address'           => [
                'create-success'    => 'Success: Company address is created successfully.',
                'update-success'    => 'Success: Company address is updated successfully.',
            ],
            'company-address'   => [
                'add-address-title'     => 'New Address',
                'update-address-title'  => 'Update Address',
                'save-btn-title'        => 'Save Address',
            ],
            'create-failed'     => 'Warning: Cannot create :attribute due to unknown reasons.',
            'update-success'    => 'Success: :resource updated successfully.',
            'update-failed'     => 'Warning: Cannot update :resource due to unknown reasons.',
            'delete-success'    => 'Success: :resource deleted successfully.',
            'delete-failed'     => 'Warning: Cannot delete :resource due to unknown reasons.',
            'exceptions'        => [
                'seller'                => 'Seller Blocked',
                'domain-not-found'      => 'Warning: Domain not found.',
                'company-blocked-by-administrator'  => 'This seller is blocked',
                'not-allowed-to-visit-this-section' => 'Warning: You are not allowed to use this section.',
                'auth'                  => 'Warning: Authentication Error!',
                'illegal-action'        => 'Warning: You are not allowed to perform this action.'
            ]
        ]
    ]
];
