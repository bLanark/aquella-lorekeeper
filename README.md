# Lorekeeper

Lorekeeper is a framework for managing deviantART-based ARPGs/closed species masterlists coded using the Laravel framework. In simple terms - you will be able to make a copy of the site, do some minor setup/enter data about your species and game, and it'll provide you with the automation to keep track of your species, players and ARPG submissions.

Demo site: [http://lorekeeper.me/](http://lorekeeper.me/)
Wiki for users: [http://lorekeeper-arpg.wikidot.com/](http://lorekeeper-arpg.wikidot.com/)

# Info

This is one of several branches I maintain for sharing modifications or projects I've made. For my general fixes branch, see master.

# Captcha

This adds a captcha to the registration page. It's not entirely finished; the error messages are not correctly hooked up. It does, however, *work*-- allowing registrations that satisfy the captcha and disallowing those that do not. And in the meantime, it spits out a rough but descriptive enough error. Given that it was done out of necessity, it did the trick.

This makes use of the [anhskohbo/No-Captcha](https://github.com/anhskohbo/no-captcha) library. Composer.json has already been updated to include this, so you can just run `composer update` or equivalent after pulling the branch.

### How to Use

These instructions are derived from those on the package itself. Note that in this case Laravel will indeed auto-discover the package. So we skip directly to configuration.

First, obtain your secret and site keys from Google; you can do so [here](https://www.google.com/recaptcha/admin).

## Setting up 
Then add `NOCAPTCHA_SECRET` and `NOCAPTCHA_SITEKEY` to your **.env** file, like so:

```
NOCAPTCHA_SECRET=secret-key
NOCAPTCHA_SITEKEY=site-key
```

If you have any questions, please feel free to contact me through email: corowne@gmail.com
That's it! The remainder of the configuration is accounted for by this branch.
