<div class="col-lg-9">

                                                                    
    
    
        <div class="section">

            <h2>

                Introduction

                <a class="permalink" name="introduction" href="#introduction">
                    <i class="fa fa-link "></i>
                </a>

            </h2>

            	<p><code>anomaly.field_type.wysiwyg</code></p>
<p>The WYSIWYG field type provides a rich text editor input powered by <a href="https://imperavi.com/redactor/" target="_blank">Redactor</a>.</p>


        </div>

                    
    
    
        <div class="section">

            <h3>

                Configuration

                <a class="permalink" name="introduction/configuration" href="#introduction/configuration">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            <p>Below is the full configuration available with defaults values:</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">"example"</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
    <span class="token string">"type"</span>   <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">"anomaly.field_type.wysiwyg"</span><span class="token punctuation">,</span>
    <span class="token string">"config"</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
        <span class="token string">"default_value"</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token keyword">null</span><span class="token punctuation">,</span>
        <span class="token string">"configuration"</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">"default"</span><span class="token punctuation">,</span>
        <span class="token string">"line_breaks"</span>   <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token boolean">false</span><span class="token punctuation">,</span>
        <span class="token string">"sync"</span>          <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token boolean">true</span><span class="token punctuation">,</span>
        <span class="token string">"height"</span>        <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token number">500</span><span class="token punctuation">,</span>
        <span class="token string">"buttons"</span>       <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token punctuation">]</span><span class="token punctuation">,</span>
        <span class="token string">"plugins"</span>       <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token punctuation">]</span><span class="token punctuation">,</span>
    <span class="token punctuation">]</span>
<span class="token punctuation">]</span></code></pre>


    <h6>Configuration</h6>

    <table class="table table-bordered table-striped">

        <thead>
        <tr>
                            <th>Key</th>
                            <th>Example</th>
                            <th>Description</th>
                    </tr>
        </thead>

        <tbody>
                    <tr>
                                    <td><p>default_value</p></td>
                                    <td><p><code>&lt;h1&gt;Hello World&lt;/h1&gt;</code></p></td>
                                    <td><p>The default value.</p></td>
                            </tr>
                    <tr>
                                    <td><p>configuration</p></td>
                                    <td><p>basic</p></td>
                                    <td><p>The configuration preset.</p></td>
                            </tr>
                    <tr>
                                    <td><p>line_breaks</p></td>
                                    <td><p>true</p></td>
                                    <td><p>If enabled, line breaks will be used instead of new paragraphs when pressing enter in the editor.</p></td>
                            </tr>
                    <tr>
                                    <td><p>sync</p></td>
                                    <td><p>true</p></td>
                                    <td><p>If disabled, storage files will NOT be synced with DB content.</p></td>
                            </tr>
                    <tr>
                                    <td><p>height</p></td>
                                    <td><p>750</p></td>
                                    <td><p>The height of the editor.</p></td>
                            </tr>
                    <tr>
                                    <td><p>buttons</p></td>
                                    <td><p>["bold", "italic"]</p></td>
                                    <td><p>Specify the available buttons for the editor. By default, available options are <code>format</code>, <code>bold</code>, <code>italic</code>, <code>deleted</code>, <code>lists</code>, <code>link</code>, <code>horizontalrule</code>, and <code>underline</code>.</p></td>
                            </tr>
                    <tr>
                                    <td><p>plugins</p></td>
                                    <td><p>["filemanager", "imagemanager"]</p></td>
                                    <td><p>Specify the available plugins for the editor. By default, available options are <code>alignment</code>, <code>inlinestyle</code>, <code>table</code>, <code>video</code>, <code>filemanager</code>, <code>imagemanager</code>, <code>source</code>, and <code>fullscreen</code>.</p></td>
                            </tr>
                </tbody>
    </table>


        </div>

        
    
        <div class="section">

            <h3>

                Addon Configuration

                <a class="permalink" name="introduction/addon-configuration" href="#introduction/addon-configuration">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>The WYSIWYG field type configures Redactor options using it's <code>redactor.php</code> config file. You can also modify storage defaults with <code>storage.php</code>.</p>
<p>You can override these options by publishing the addon and modifying the resulting configuration file:</p>
<pre class=" language-php"><code class=" language-php">php artisan addon<span class="token punctuation">:</span>publish anomaly<span class="token punctuation">.</span>field_type<span class="token punctuation">.</span>wysiwyg</code></pre>
<p>The field type will be published to <code>/resources/{application}/addons/anomaly/wysiwyg-field_type</code>.</p>
<div class="alert alert-success">
<strong>Success:</strong> If you feel something is missing - add it to the config and send a pull request to <a href="https://github.com/anomalylabs/wysiwyg-field_type" target="_blank">https://github.com/anomalylabs/wysiwyg-field_type</a>
</div>


        </div>

        
    
        <div class="section">

            <h3>

                Storage Files

                <a class="permalink" name="introduction/storage-files" href="#introduction/storage-files">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>The WYSIWYG field type dumps content to a corresponding <code>storage file</code>. The path to this file will be visible underneath the editor when <code>app.debug</code> is enabled.</p>
<p>You can edit this file directly and it will automatically sync back and forth with the database value. This is for convenience only, never commit the storage directory.</p>


        </div>

        
    
        
    
        <div class="section">

            <h2>

                Usage

                <a class="permalink" name="usage" href="#usage">
                    <i class="fa fa-link "></i>
                </a>

            </h2>

            	<p>This section will show you how to use the field type via API and in the view layer.</p>


        </div>

                    
    
    
        <div class="section">

            <h3>

                Setting Values

                <a class="permalink" name="usage/setting-values" href="#usage/setting-values">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>You can set the field type value with a string.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$entry</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">example</span> <span class="token operator">=</span> <span class="token variable">$html</span><span class="token punctuation">;</span></code></pre>


        </div>

        
    
        <div class="section">

            <h3>

                Basic Output

                <a class="permalink" name="usage/basic-output" href="#usage/basic-output">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>The field type always returns the storage file content by default.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$entry</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">example</span><span class="token punctuation">;</span> <span class="token comment" spellcheck="true">// Raw contents of storage::example/input/file.html</span></code></pre>


        </div>

        
    
        <div class="section">

            <h3>

                Presenter Output

                <a class="permalink" name="usage/presenter-output" href="#usage/presenter-output">
                    <i class="fa fa-link "></i>
                </a>

            </h3>

            	<p>This section will show you how to use the decorated value provided by the <code>\Anomaly\WysiwygFieldType\WysiwygFieldTypePresenter</code> class.</p>


        </div>

                    
    
    
        <div class="section">

            <h4>

                WysiwygFieldTypePresenter::path()

                <a class="permalink" name="usage/presenter-output/wysiwygfieldtypepresenter-path" href="#usage/presenter-output/wysiwygfieldtypepresenter-path">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            <p>The <code>path</code> method returns the prefix hinted path to the storage file.</p>

    <h6>Returns: 
        <code>string</code>
    </h6>



    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$decorated</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">example</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">path</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span> <span class="token comment" spellcheck="true">// storage::the/path/example.html</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> decorated<span class="token punctuation">.</span>example<span class="token punctuation">.</span><span class="token function">path</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">}</span><span class="token punctuation">}</span> <span class="token comment" spellcheck="true">// storage::the/path/example.html</span></code></pre>



        </div>

        
    
        <div class="section">

            <h4>

                WysiwygFieldTypePresenter::render()

                <a class="permalink" name="usage/presenter-output/wysiwygfieldtypepresenter-render" href="#usage/presenter-output/wysiwygfieldtypepresenter-render">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            <p>The <code>render</code> method returns the rendered view using the storage file.</p>

    <h6>Returns: 
        <code>string</code>
    </h6>


    <h6>Arguments</h6>

    <table class="table table-bordered table-striped">

        <thead>
        <tr>
                            <th>Key</th>
                            <th>Required</th>
                            <th>Type</th>
                            <th>Default</th>
                            <th>Description</th>
                    </tr>
        </thead>

        <tbody>
                    <tr>
                                    <td><p>$payload</p></td>
                                    <td><p>false</p></td>
                                    <td><p>array</p></td>
                                    <td><p>null</p></td>
                                    <td><p>Additional payload data for the view.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$decorated</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">example</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">render</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Ryan'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> decorated<span class="token punctuation">.</span>example<span class="token punctuation">.</span><span class="token function">render</span><span class="token punctuation">(</span><span class="token punctuation">{</span><span class="token string">'name'</span><span class="token punctuation">:</span> <span class="token string">'Ryan'</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token operator">|</span>raw <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>



        </div>

        
    
        <div class="section">

            <h4>

                WysiwygFieldTypePresenter::content()

                <a class="permalink" name="usage/presenter-output/wysiwygfieldtypepresenter-content" href="#usage/presenter-output/wysiwygfieldtypepresenter-content">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            <p>The <code>content</code> method returns the raw value.</p>

    <h6>Returns: 
        <code>string</code>
    </h6>



    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$decorated</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">example</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">content</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> decorated<span class="token punctuation">.</span>example<span class="token punctuation">.</span><span class="token function">content</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>



        </div>

        
    
        <div class="section">

            <h4>

                WysiwygFieldTypePresenter::excerpt()

                <a class="permalink" name="usage/presenter-output/wysiwygfieldtypepresenter-excerpt" href="#usage/presenter-output/wysiwygfieldtypepresenter-excerpt">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            <p>The <code>excerpt</code> method returns a limited snippet from the <code>text</code> method while preserving whole words.</p>

    <h6>Returns: 
        <code>string</code>
    </h6>


    <h6>Arguments</h6>

    <table class="table table-bordered table-striped">

        <thead>
        <tr>
                            <th>Key</th>
                            <th>Required</th>
                            <th>Type</th>
                            <th>Default</th>
                            <th>Description</th>
                    </tr>
        </thead>

        <tbody>
                    <tr>
                                    <td><p>$length</p></td>
                                    <td><p>false</p></td>
                                    <td><p>integer</p></td>
                                    <td><p>100</p></td>
                                    <td><p>The length to limit the value by.</p></td>
                            </tr>
                    <tr>
                                    <td><p>$end</p></td>
                                    <td><p>false</p></td>
                                    <td><p>string</p></td>
                                    <td><p>...</p></td>
                                    <td><p>The ending for the string only if truncated.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$decorated</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">example</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">excerpt</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> decorated<span class="token punctuation">.</span>example<span class="token punctuation">.</span><span class="token function">excerpt</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>



        </div>

        
    
        <div class="section">

            <h4>

                WysiwygFieldTypePresenter::text()

                <a class="permalink" name="usage/presenter-output/wysiwygfieldtypepresenter-text" href="#usage/presenter-output/wysiwygfieldtypepresenter-text">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            <p>The <code>text</code> method returns the text-only content from the storage file.</p>

    <h6>Returns: 
        <code>string</code>
    </h6>


    <h6>Arguments</h6>

    <table class="table table-bordered table-striped">

        <thead>
        <tr>
                            <th>Key</th>
                            <th>Required</th>
                            <th>Type</th>
                            <th>Default</th>
                            <th>Description</th>
                    </tr>
        </thead>

        <tbody>
                    <tr>
                                    <td><p>$allowed</p></td>
                                    <td><p>false</p></td>
                                    <td><p>string</p></td>
                                    <td><p>none</p></td>
                                    <td><p>The string of tags to allow.</p></td>
                            </tr>
                </tbody>
    </table>

    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$decorated</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">example</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">text</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> decorated<span class="token punctuation">.</span>example<span class="token punctuation">.</span><span class="token function">text</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>



        </div>

        
    
        <div class="section">

            <h4>

                WysiwygFieldTypePresenter::__toString()

                <a class="permalink" name="usage/presenter-output/wysiwygfieldtypepresenter-tostring" href="#usage/presenter-output/wysiwygfieldtypepresenter-tostring">
                    <i class="fa fa-link "></i>
                </a>

            </h4>

            <p>The <code>__toString</code> method is mapped to the <code>render</code> method.</p>

    <h6>Returns: 
        <code>string</code>
    </h6>



    <h6>Example</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token variable">$decorated</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">example</span><span class="token punctuation">;</span></code></pre>

    <h6>Twig</h6>

    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> decorated<span class="token punctuation">.</span>example<span class="token operator">|</span>raw <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>

    <div class="alert alert-danger">
<strong>Heads Up:</strong> The <strong>__toString</strong> will not properly display exceptions spurring from value content.
</div>


        </div>

        
    
        
    
        
    
                                            
                </div>
