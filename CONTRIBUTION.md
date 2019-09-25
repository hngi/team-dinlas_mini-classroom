*Welcome, and thank you for contributing to this project. Please take your time to study this document carefully before making any changes to the codebase, to ensure you're on the same page with the rest of the team and we can all collaborate seamlessly.*   

# Workflow
This project's workflow is based on the [GitHub Flow](https://guides.github.com/introduction/flow/). More indepth git flow article [here](https://nvie.com/posts/a-successful-git-branching-model/).     

## Branch Structure   
__'*develop*' - The Integration branch.__ This is the default branch. This is where features from the subteams are brought together. Subteams, submit your pull requests here, once your subteam branch is ready for integration. An integration team will be responsible for bringing it all together and resolving any possible merge conflicts that may arise.        
__'*master*' - The deployment branch.__ The code on this branch goes live to our hosting servers and must be kept in pristine condition. When the integration (develop) branch reaches a milestone, the deployment (master) branch is updated via pull request.      
__Hotfix branches.__ In the event that a bug slips past the integration team and makes it into deployment, a hotfix branch is created off of *master*. Prefix hotfix branch names with "hf__". On completion, this branch is merged with master, and also with *develop* so the fixes are reflected in all future deployments.     
**Documentation changes** will also be treated similar to hotfixes. From time to time, changes will be made to the project's documentations e.g README.md or this file you're reading now. These changes are made in a working branch created from, and merged back into, the *develop* branch. You should prefix such branches with "doc--" to separate them from other working branches. e.g *doc--@Feranmi-Akinlade*.      
__Subteam branches - Frontend & Backend.__ Of course there is the design subteam, but they work on Figma, so no branch here. When a milestone is reached, a pull request is made to the *develop* branch.      
__Working branch.__ This is where initial work gets done. Any new features are broken down into tasks for each team member who then creates a working branch to work in. The name of a working branch should correspond with the Slack display name of the person assigned to this task. Working branch names should begin with an "@" and all spaces should be replaced with a dash. Example: @Feranmi-Akinlade. Create a working branch from, and merge it back into, the subteam branch that owns the task. Make sure you branch off the right source branch depending on the task (frontend/backend) you're working on.     

### Staying Updated
When working with teams on the same codebase, sometimes others make changes that affect your work. While great care has been taken to create a modular team workflow to keep this to a minimum, merge conflicts are inevitable. It would _suck_ to finish working on a task, only to find that the codebase has evolved and you need to rework everything to conform to the new changes. This is managed in two ways.       
__*First*__, discuss changes with the team beforehand. This is to ensure that you do not make changes that will adversely affect the work of others. GitHub has a handy feature for this - _[issues](https://help.github.com/en/articles/about-issues)_. [Create an issue](https://help.github.com/en/articles/creating-an-issue) and [label it](https://help.github.com/en/articles/applying-labels-to-issues-and-pull-requests). When you create an issue, it is automatically tracked on the team's [project board](https://help.github.com/en/articles/about-project-boards). Keep the issue open as long as work continues on the feature. All discussions regarding that feature are done under this issue. Your pull request is linked with the corresponding issue when work is completed, by adding "*closes #{number}*" to the pull request description on GitHub. Replace {number} with the appropriate issue number e.g _closes #5_.       
__*Second*__, each team member needs to make sure that at every given time, their working directory is up-to-date with the latest changes from the remote origin (online).       
Make sure you have the _origin_ remote set up.    
  <pre>git remote add origin git://github.com/team-wildcards/trip.ng.git</pre>    
You will be pushing your work to 'origin' to back it up online.       
__*The following steps must be run periodically to keep your work up-to-date. You can run these commands as often as every hour. You want to fetch any new changes as soon as possible.*__       
Be sure to [stash](https://dev.to/neshaz/how-to-git-stash-your-work-the-correct-way-cna) 
or commit all local changes first.  

1. Switch to your subteam branch        
    <pre>git checkout frontend</pre>          
2. Get all remote (online) changes from 'origin' into your local computer.        
    <pre>git fetch origin</pre>      
3. Merge changes fecthed with your local subteam branch. (The local subteam branch must be the currently checked-out branch. See step 1 above.)        
    <pre>git merge origin/frontend</pre>      
4. Next, switch to your working branch.        
    <pre>git checkout @your-slack-username</pre>      
5. Merge the changes on the newly merged subteam branch, into your working branch. You may run 'git branch' to confirm which branch you're about to merge into.        
    <pre>git merge frontend</pre>
    *You may encounter merge conflicts here.
    [Resolve them](https://help.github.com/en/articles/resolving-a-merge-conflict-using-the-command-line),
    then come back and complete the merge. If you merge often enough, any conflicts would be trivial and very few.*    

6. Finally, push your newly merged working branch to the remote github server for back up.        
    <pre>git push origin @your-slack-user-name</pre>      

# Code Structrure & Readability
## FRONT-END
This section defines the guidelines and methodologies to used for the front-end of this project. This applies to all HTML, CSS, and JavaScript code.

### CSS - Introducing BEM.
CSS is great, but it can get messy and difficult to maintain styles as the css file grows larger. It is therefore necessary for the team to adhere to strict guidelines when work on our stylesheets to keep the code clean and maintainable.
**_Do not use abbreviations when naming elements. This introduces confusion as other team members may struggle to figure out what it represents. For example, use ```.button``` instead of ```.btn```. It may be longer to type, but it makes your code more readable and saves the team headache. Be very generous with comments._**

#### Do Not Use Inline Styles. Ever.
Inline styles have just about the highest specificity an so cannot be overriden from with the stylesheet. They also make debugging style conflicts more difficult. Inline styles do not lend themselves to the DRY principle.   

#### Do Not Use `!important`.
This is a suggestion you will find on many blogs and articles - and for good reason. The `!important` flag is a shortcut that doesn't really fix the problem. You should fix any specifity issues that cause your rules to be overridden. Using `!important` will have unintended consequences later on by also overriding styles you didn't want it to affect. The methodology described in this document was designed to avoid all specificity issues that may create a desire for `!important`. Following these guidelines will make styling a breeze.

#### Modularity
The complexity of a stylesheet is directly proportional to the length of the file. 
It is therefore necessary to break to styles into smaller files. the following rules apply when creating stylesheets
for this project.

##### A separate stylesheet for each page.

##### A separate stylesheet for each reusable component.
An example of a reusable component is the footer section which is present on every page. This 
also includes components whose contents might change but need to appear consistently throughout the web app,
Examples include buttons and headings. All instances these elements share the same styles.
Styles for this section should not be repeated in each page's stylesheet, rather a separate stylesheet should be 
created for such sections and added to every page that needs it using the `@import` CSS rule.

#### Selectors - The BEM Methodology
The guidelines in this section are based heavily on the popular CSS methodology called BEM.
BEM stands for Block, Element, Modifier and describes a standard for consistently naming CSS selectors that makes
both HTML and CSS easier to read, understand, and hence to maintain.

##### Rule 1 - Stick to class selectors
Only use class for selectors. Avoid using id or decendant selectors. This helps prevent problems relating to specifity.

##### Rule 2 - Each section of a page defines a new block.
Example
```css
  .landing-section {
    /*your styles here*/
  }
```

##### Rule 3 - Mark UI elements with double underscore
Identify each UI element within a block with the double underscore BEM naming convention.
Example
```css
  .landing-section__action-button {
    /*your styles here*/
  }
```
Some elements may also constitute their own block. This is common with reusable components.
In this case we separate composition from layout with two classes. One for the element, and one for the block it renders.
For example, a button which contains an icon may be defined as follows...
```html
  <button class="button is-with-icon login-form__button">
    <img src="debit-card.png" class="button__icon">
    Donate Now
  </button>
```

Here the block class is *.button*, which defines the structure (composition) of the button such as its color, box-shadow etc. This should be defined in the button component CSS file.
The element class is *.login-form__button which defines the position (layout) of the button within its parent block. Should be defined in the current page's CSS file or that of its parent component if used within a larger reusable component, such as a footer section.
And lastly, *.is-with-icon* is a state class (modifier, see next rule) which specifies additional styles that only applies to buttons that contain icons. This must be defined in the button component CSS file.

##### Rule 4 - Define modifiers with additional CSS classes.
Modifiers define additional styles for different states of a UI element.
A button for example might have a disabled state when it is unclickable, perhaps because the user needs to enter
some information before submitting a form.
We divert a bit from the BEM recommendation here by thinking in terms of *state* rather than *modifier*. 
Element states should be defined using additional CSS classes prefixed with *'is-'*

For example, the element
```html
  <button class="login-form__button is-disabled"></button>
```
should have default styles defined as 
```css
  .login-form__button {
    /*your styles here*/
  }
```
Additional styles to be applied when it is disabled will then be defined as
```css
  .login-form__button.is-disabled {
    /*your styles here*/
  }
```
The use of state classes in place of the BEM double dash modifier convention allows easy toggling of these
states from JavaScript using the 
```javascript
  HTMLElement.classList.add('is.disabled');
```
method. This also offers a higher specifity which assures that the state changes will override the default styles.   
[Read about specifity]().

##### Rule 5 - Decendant selectors - A special case.
Sometimes, it may be necessary to change an elements styles based on the state of it's parent *block*.
In this case, the decendant selector is used. Avoid using the direct child selector. *[Learn why.]()*
**Example**
We might want to highlight the action button on a card when the user clicks on the card.
```css
  .card.is-focused .card__button {
    background-color: var(--accent-color); /*Using CSS vars. See next section.*/
  }
```
This also offers a higher specificity which ensures that the state changes will override any defaults.

#### Reusable Values With CSS Variables (Custom Properties) - Managing Themes and Color Schemes
We define reusable values, and global defaults, in a globals.css file. This file must be imported by all other **_page_** CSS files, to apply global default styles, and also to use predefined color and other reusable values defined in this file through [CSS Variables]() when styling elements, thereby improving code [DRYness](). This makes it easier to manage color values and themes from a central place. Globals are only imported in _page_ css files and not _components_ because their values are applicable throughout the page. Therefore importing in each component file is redundant. Here is a snippet from _globals.css_.
```css
  :root {
    --primary-color: #2D0051;
    --accent-color: #FFE500;
    width: 100vw;
    overflow-x: hidden;
  }
```

### HTML
**_Do not use abbreviations when naming elements. This introduces confusion as other team members may struggle to figure out what it represents. For example, use ```.button``` instead of ```.btn```. Be very generous with comments._**

#### Semantics Please.
HTML5 introduced semantic tags that such as ```<section>``` and ```<footer>``` which implicitly convey meaning about their
purpose on the page. These tags improve accesibility by making it easier for screen readers to interprete the information on a page for visually impaired users, and also aiding Search Engine Optimization. Where relevant, use these tags instead of the generic containers.

##### Rule 1 - Headings
All headings must be marked with relevant tags from h1 to h6 depending to the page heirachy. Do not use CSS to style a paragraph or span into an heading appearance.

##### Rule 2 - Button vs. Anchor Link
The anchor tag in HTML has a specific function - linking a user to another page. Buttons on the other hand are used to provide additional functionality to the user. Therefore, if a button takes the user to a new page, only then must the anchor tag be used. In all other cases, the button tag must be used.

##### Rule 3 - Logical sections
```<header>```, ```<section>```, ```<aside>```, ```<footer>```. These are semantic HTML5 tags used to mark separate sections of a page. Do NOT use the generic <div> tag where any of these would be more appropriate.

### JavaScript
**_Do not use abbreviations when naming elements. This introduces confusion as other team members may struggle to figure out what it represents. For example, use ```let navButton``` instead of ```let navBtn```. It may be longer to type, but it makes your code more readable and saves the team headache. Be very generous with comments._**

Write clean code. Make things modular. Keep external libraries to minimum to avoid making the app bloated.
Further guidelines to be included as the project progresses.
